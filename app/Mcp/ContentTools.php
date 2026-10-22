<?php

namespace App\Mcp;

use App\Models\Course;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use InvalidArgumentException;

/**
 * Website content tools exposed to Claude over MCP.
 *
 * Deliberately limited:
 * - Only website content (posts, services, courses, FAQs, text site settings).
 *   Clients, invoices, expenses, projects, team and users are never reachable.
 * - New posts, services and FAQs are created hidden (draft / inactive); a person publishes them in admin.
 * - No deleting, no publishing, no file uploads.
 * - Every update saves the previous version to storage/app/mcp-history first, so changes can be rolled back.
 */
class ContentTools
{
    // Tags allowed in HTML fields that the site prints raw (post body, service content).
    private const ALLOWED_HTML = '<h2><h3><h4><h5><p><br><hr><ul><ol><li><strong><b><em><i><u><a><blockquote>'
        .'<img><figure><figcaption><table><thead><tbody><tr><th><td><div><section><span><code><pre>';

    private const POST_SEO_RULES = [
        'meta_title' => ['nullable', 'string', 'max:60'],
        'meta_description' => ['nullable', 'string', 'max:160'],
        'meta_keywords' => ['nullable', 'string', 'max:500'],
        'excerpt' => ['nullable', 'string', 'max:500'],
    ];

    private const FAQ_LIST_RULES = [
        'faqs' => ['nullable', 'array', 'max:20'],
        'faqs.*.question' => ['required', 'string', 'max:500'],
        'faqs.*.answer' => ['required', 'string', 'max:5000'],
    ];

    public static function definitions(): array
    {
        $seo = [
            'meta_title' => ['type' => 'string', 'description' => 'Max 60 chars.'],
            'meta_description' => ['type' => 'string', 'description' => 'Max 160 chars, ideally 120-155.'],
            'meta_keywords' => ['type' => 'string', 'description' => 'Comma-separated.'],
            'excerpt' => ['type' => 'string', 'description' => 'Short summary shown on blog listings. Max 500 chars.'],
        ];
        $faqs = ['faqs' => [
            'type' => 'array',
            'description' => 'FAQ list shown under the post. Replaces the existing list.',
            'items' => [
                'type' => 'object',
                'properties' => ['question' => ['type' => 'string'], 'answer' => ['type' => 'string']],
                'required' => ['question', 'answer'],
            ],
        ]];
        $html = 'HTML. Allowed tags: h2-h5, p, ul, ol, li, strong, em, a, blockquote, img, figure, table, div, section, span, code, pre. Scripts, styles and event handlers are removed.';

        return [
            self::tool('audit_seo', 'Report SEO and content problems across blog posts, services and courses: missing or over-long titles/descriptions, duplicate titles, thin content, missing images, drafts. Read-only.', []),

            self::tool('list_posts', 'List blog posts (id, title, slug, status, SEO fields), newest first.', [
                'status' => ['type' => 'string', 'enum' => ['draft', 'published'], 'description' => 'Filter by status. Omit for all.'],
                'limit' => ['type' => 'integer', 'description' => 'Default 50, max 100.'],
            ]),
            self::tool('get_post', 'Get one blog post including body HTML and FAQs.', ['id' => ['type' => 'integer']], ['id']),
            self::tool('create_post', 'Create a blog post as a DRAFT (hidden from the website). It cannot be published through this tool; an admin adds a featured image and publishes it at /admin/posts.', $seo + $faqs + [
                'title' => ['type' => 'string'],
                'body' => ['type' => 'string', 'description' => $html],
                'slug' => ['type' => 'string', 'description' => 'Optional; generated from the title if omitted.'],
                'author_name' => ['type' => 'string', 'description' => 'Defaults to "<company name> Team".'],
            ], ['title', 'body']),
            self::tool('update_post', 'Update a blog post\'s content or SEO fields. Only provided fields change. Cannot publish or unpublish. Changes to a published post go live immediately.', $seo + $faqs + [
                'id' => ['type' => 'integer'],
                'title' => ['type' => 'string'],
                'body' => ['type' => 'string', 'description' => $html],
                'author_name' => ['type' => 'string'],
            ], ['id']),

            self::tool('list_services', 'List service pages (id, name, slug, active, description).', []),
            self::tool('get_service', 'Get one service page including its content HTML.', ['id' => ['type' => 'integer']], ['id']),
            self::tool('create_service', 'Create a service page as INACTIVE (hidden). An admin activates it.', [
                'name' => ['type' => 'string'],
                'slug' => ['type' => 'string', 'description' => 'Optional; generated from the name if omitted.'],
                'description' => ['type' => 'string', 'description' => 'Short plain-text summary.'],
                'content' => ['type' => 'string', 'description' => $html.' Existing service pages use Tailwind classes on div/section; keep that style.'],
            ], ['name', 'content']),
            self::tool('update_service', 'Update a service page\'s name, description or content. Only provided fields change. Cannot activate or deactivate. Changes to an active service go live immediately.', [
                'id' => ['type' => 'integer'],
                'name' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'content' => ['type' => 'string', 'description' => $html],
            ], ['id']),

            self::tool('list_courses', 'List courses (id, title, slug, level, duration, price, active, featured, description).', []),
            self::tool('update_course', 'Update a course\'s title, description, duration or level. Only provided fields change. Cannot change price or visibility. Changes go live immediately.', [
                'id' => ['type' => 'integer'],
                'title' => ['type' => 'string'],
                'description' => ['type' => 'string', 'description' => 'Plain text.'],
                'duration' => ['type' => 'string', 'description' => 'e.g. "8 weeks".'],
                'level' => ['type' => 'string', 'enum' => ['beginner', 'intermediate', 'advanced']],
            ], ['id']),

            self::tool('list_faqs', 'List site FAQs (id, question, answer, category, active, sort order).', [
                'category' => ['type' => 'string', 'description' => 'Filter by category. Omit for all.'],
            ]),
            self::tool('create_faq', 'Create a site FAQ as INACTIVE (hidden). An admin activates it.', [
                'question' => ['type' => 'string'],
                'answer' => ['type' => 'string', 'description' => 'Plain text.'],
                'category' => ['type' => 'string', 'description' => 'Default "general".'],
                'sort_order' => ['type' => 'integer'],
            ], ['question', 'answer']),
            self::tool('update_faq', 'Update a site FAQ. Only provided fields change. Cannot activate or deactivate. Changes to an active FAQ go live immediately.', [
                'id' => ['type' => 'integer'],
                'question' => ['type' => 'string'],
                'answer' => ['type' => 'string'],
                'category' => ['type' => 'string'],
                'sort_order' => ['type' => 'integer'],
            ], ['id']),

            self::tool('list_site_settings', 'List text site settings (company name, contact details, footer text, social links). Image settings are not included.', []),
            self::tool('update_site_setting', 'Change the value of an EXISTING text site setting. Cannot create new keys or change images. Goes live immediately.', [
                'key' => ['type' => 'string'],
                'value' => ['type' => 'string'],
            ], ['key', 'value']),
        ];
    }

    public static function call(string $name, array $a): mixed
    {
        return match ($name) {
            'audit_seo' => self::audit(),

            'list_posts' => self::listPosts($a),
            'get_post' => self::postArray(Post::findOrFail(self::id($a)), true),
            'create_post' => self::createPost($a),
            'update_post' => self::updatePost($a),

            'list_services' => Service::orderBy('id')->get()->map(fn ($s) => self::serviceArray($s))->all(),
            'get_service' => self::serviceArray(Service::findOrFail(self::id($a)), true),
            'create_service' => self::createService($a),
            'update_service' => self::updateService($a),

            'list_courses' => Course::orderBy('id')->get()->map(fn ($c) => self::courseArray($c))->all(),
            'update_course' => self::updateCourse($a),

            'list_faqs' => self::listFaqs($a),
            'create_faq' => self::createFaq($a),
            'update_faq' => self::updateFaq($a),

            'list_site_settings' => self::textSettings()->map(fn ($s) => $s->only(['key', 'value', 'group']))->values()->all(),
            'update_site_setting' => self::updateSetting($a),

            default => throw new InvalidArgumentException("Unknown tool: {$name}"),
        };
    }

    // ---- helpers ------------------------------------------------------------

    private static function tool(string $name, string $description, array $props, array $required = []): array
    {
        return [
            'name' => $name,
            'description' => $description,
            'inputSchema' => array_filter([
                'type' => 'object',
                'properties' => (object) $props,
                'required' => $required ?: null,
            ]),
        ];
    }

    private static function id(array $a): int
    {
        return (int) ($a['id'] ?? 0);
    }

    private static function validate(array $data, array $rules): array
    {
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            throw new InvalidArgumentException(implode(' ', $v->errors()->all()));
        }

        return $v->validated();
    }

    private static function clean(?string $html): ?string
    {
        if ($html === null) {
            return null;
        }
        // Remove dangerous blocks together with their contents, then strip disallowed tags.
        $html = preg_replace('#<(script|style|iframe|object|embed|form)\b[^>]*>.*?</\1\s*>#is', '', $html);
        $html = strip_tags($html, self::ALLOWED_HTML);
        // Drop inline event handlers, inline styles and javascript:/data: URLs left on allowed tags.
        $html = preg_replace('/\s(on\w+|style)\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $html);
        $html = preg_replace('/(href|src)\s*=\s*(["\'])\s*(javascript|data|vbscript):[^"\']*\2/i', '$1=$2#$2', $html);

        return $html;
    }

    private static function plain(?string $text): ?string
    {
        return $text === null ? null : trim(strip_tags($text));
    }

    private static function uniqueSlug(string $modelClass, string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source) ?: 'item';
        $slug = $base;
        for ($i = 2; $modelClass::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists(); $i++) {
            $slug = "{$base}-{$i}";
        }

        return $slug;
    }

    /** Save the current version of a record before changing it, so it can be restored by hand. */
    private static function snapshot(string $type, Model $model): void
    {
        $file = sprintf('mcp-history/%s-%s-%s.json', $type, $model->getKey(), now()->format('Ymd-His-u'));
        Storage::disk('local')->put($file, json_encode($model->getAttributes(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    private static function cleanFaqList(?array $faqs): ?array
    {
        if ($faqs === null) {
            return null;
        }

        return array_values(array_map(fn ($f) => [
            'question' => self::plain($f['question']),
            'answer' => self::plain($f['answer']),
        ], $faqs));
    }

    // ---- posts --------------------------------------------------------------

    private static function postArray(Post $p, bool $full = false): array
    {
        $row = [
            'id' => $p->id,
            'title' => $p->title,
            'slug' => $p->slug,
            'status' => $p->status ?? 'published',
            'url' => route('blog.show', $p->slug),
            'author_name' => $p->author_name,
            'excerpt' => $p->excerpt,
            'meta_title' => $p->meta_title,
            'meta_description' => $p->meta_description,
            'meta_keywords' => $p->meta_keywords,
            'has_featured_image' => (bool) $p->image,
            'created_at' => $p->created_at?->toDateString(),
        ];

        return $full ? $row + ['body' => $p->body, 'faqs' => $p->faqs ?? []] : $row;
    }

    private static function listPosts(array $a): array
    {
        $d = self::validate($a, [
            'status' => ['nullable', 'in:draft,published'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = max(1, min(100, (int) ($d['limit'] ?? 50)));

        return Post::when($d['status'] ?? null, fn ($q, $s) => $q->where('status', $s))
            ->latest('id')->limit($limit)->get()
            ->map(fn ($p) => self::postArray($p))->all();
    }

    private static function createPost(array $a): array
    {
        $d = self::validate($a, self::POST_SEO_RULES + self::FAQ_LIST_RULES + [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'slug' => ['nullable', 'string', 'max:255'],
            'author_name' => ['nullable', 'string', 'max:255'],
        ]);

        $d['slug'] = self::uniqueSlug(Post::class, $d['slug'] ?? $d['title']);
        $d['body'] = self::clean($d['body']);
        $d['author_name'] = $d['author_name'] ?? SiteSetting::get('company_name', 'Execudea').' Team';
        if (array_key_exists('faqs', $d)) {
            $d['faqs'] = self::cleanFaqList($d['faqs']);
        }

        $post = new Post($d);
        $post->status = 'draft';
        $post->save();

        return self::postArray($post) + ['note' => 'Saved as a draft. An admin can add a featured image and publish it at '.route('posts.edit', $post->id)];
    }

    private static function updatePost(array $a): array
    {
        $d = self::validate($a, self::POST_SEO_RULES + self::FAQ_LIST_RULES + [
            'id' => ['required', 'integer'],
            'title' => ['sometimes', 'string', 'max:255'],
            'body' => ['sometimes', 'string'],
            'author_name' => ['sometimes', 'string', 'max:255'],
        ]);
        $post = Post::findOrFail($d['id']);
        unset($d['id']);

        if (isset($d['body'])) {
            $d['body'] = self::clean($d['body']);
        }
        if (array_key_exists('faqs', $d)) {
            $d['faqs'] = self::cleanFaqList($d['faqs']);
        }

        self::snapshot('post', $post);
        $post->update($d);

        return self::postArray($post->fresh());
    }

    // ---- services -----------------------------------------------------------

    private static function serviceArray(Service $s, bool $full = false): array
    {
        $row = [
            'id' => $s->id,
            'name' => $s->name,
            'slug' => $s->slug,
            'url' => route('services.show', $s->slug),
            'is_active' => $s->is_active,
            'description' => $s->description,
        ];

        return $full ? $row + ['content' => $s->content] : $row;
    }

    private static function createService(array $a): array
    {
        $d = self::validate($a, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'content' => ['required', 'string'],
        ]);

        $service = new Service([
            'name' => self::plain($d['name']),
            'slug' => self::uniqueSlug(Service::class, $d['slug'] ?? $d['name']),
            'description' => self::plain($d['description'] ?? null),
            'content' => self::clean($d['content']),
        ]);
        $service->is_active = false;
        $service->save();

        return self::serviceArray($service) + ['note' => 'Created as inactive. An admin needs to activate it before it shows on the website.'];
    }

    private static function updateService(array $a): array
    {
        $d = self::validate($a, [
            'id' => ['required', 'integer'],
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string', 'max:2000'],
            'content' => ['sometimes', 'string'],
        ]);
        $service = Service::findOrFail($d['id']);
        unset($d['id']);

        foreach (['name', 'description'] as $f) {
            if (array_key_exists($f, $d)) {
                $d[$f] = self::plain($d[$f]);
            }
        }
        if (isset($d['content'])) {
            $d['content'] = self::clean($d['content']);
        }

        self::snapshot('service', $service);
        $service->update($d);

        return self::serviceArray($service->fresh());
    }

    // ---- courses ------------------------------------------------------------

    private static function courseArray(Course $c): array
    {
        return [
            'id' => $c->id,
            'title' => $c->title,
            'slug' => $c->slug,
            'url' => route('courses.show', $c->slug),
            'level' => $c->level,
            'duration' => $c->duration,
            'price' => $c->price,
            'is_active' => $c->is_active,
            'is_featured' => $c->is_featured,
            'has_image' => (bool) $c->image,
            'description' => $c->description,
        ];
    }

    private static function updateCourse(array $a): array
    {
        $d = self::validate($a, [
            'id' => ['required', 'integer'],
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string', 'max:10000'],
            'duration' => ['sometimes', 'nullable', 'string', 'max:255'],
            'level' => ['sometimes', 'in:beginner,intermediate,advanced'],
        ]);
        $course = Course::findOrFail($d['id']);
        unset($d['id']);
        $d = array_map(fn ($v) => is_string($v) ? self::plain($v) : $v, $d);

        self::snapshot('course', $course);
        $course->update($d);

        return self::courseArray($course->fresh());
    }

    // ---- FAQs ---------------------------------------------------------------

    private static function faqArray(Faq $f): array
    {
        return $f->only(['id', 'question', 'answer', 'category', 'is_active', 'sort_order']);
    }

    private static function listFaqs(array $a): array
    {
        return Faq::when($a['category'] ?? null, fn ($q, $c) => $q->where('category', (string) $c))
            ->ordered()->get()->map(fn ($f) => self::faqArray($f))->all();
    }

    private static function createFaq(array $a): array
    {
        $d = self::validate($a, [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:5000'],
            'category' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $faq = new Faq([
            'question' => self::plain($d['question']),
            'answer' => self::plain($d['answer']),
            'category' => self::plain($d['category'] ?? null) ?: 'general',
            'sort_order' => $d['sort_order'] ?? 0,
        ]);
        $faq->is_active = false;
        $faq->save();

        return self::faqArray($faq) + ['note' => 'Created as inactive. An admin needs to activate it.'];
    }

    private static function updateFaq(array $a): array
    {
        $d = self::validate($a, [
            'id' => ['required', 'integer'],
            'question' => ['sometimes', 'string', 'max:255'],
            'answer' => ['sometimes', 'string', 'max:5000'],
            'category' => ['sometimes', 'string', 'max:100'],
            'sort_order' => ['sometimes', 'integer'],
        ]);
        $faq = Faq::findOrFail($d['id']);
        unset($d['id']);
        $d = array_map(fn ($v) => is_string($v) ? self::plain($v) : $v, $d);

        self::snapshot('faq', $faq);
        $faq->update($d);

        return self::faqArray($faq->fresh());
    }

    // ---- site settings ------------------------------------------------------

    private static function textSettings()
    {
        return SiteSetting::where('type', '!=', 'image')->orderBy('group')->orderBy('key')->get();
    }

    private static function updateSetting(array $a): array
    {
        $d = self::validate($a, [
            'key' => ['required', 'string', 'max:255'],
            'value' => ['present', 'nullable', 'string', 'max:5000'],
        ]);

        $setting = SiteSetting::where('key', $d['key'])->first();
        if (! $setting) {
            throw new InvalidArgumentException("No site setting named \"{$d['key']}\". Use list_site_settings to see the keys.");
        }
        if ($setting->type === 'image') {
            throw new InvalidArgumentException('Image settings cannot be changed through this tool.');
        }

        $value = self::plain($d['value']);
        if (Str::startsWith($setting->key, 'social_') && $value !== '' && $value !== null
            && ! filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Social links must be full URLs (https://...).');
        }

        self::snapshot('setting', $setting);
        $setting->update(['value' => $value]);

        return $setting->only(['key', 'value', 'group']);
    }

    // ---- audit --------------------------------------------------------------

    private static function audit(): array
    {
        $issues = [];
        $add = function (string $where, string $problem) use (&$issues) {
            $issues[] = ['where' => $where, 'problem' => $problem];
        };
        $checkDescription = function (string $where, ?string $d) use ($add) {
            $len = mb_strlen((string) $d);
            if ($len === 0) {
                $add($where, 'No meta description.');
            } elseif ($len < 70 || $len > 160) {
                $add($where, "Meta description is {$len} chars (aim for 120-155).");
            }
        };

        $posts = Post::all();
        $titles = $posts->map(fn ($p) => Str::lower($p->meta_title ?: $p->title))->countBy();
        foreach ($posts as $p) {
            $w = "post:{$p->id} ({$p->slug})";
            $t = $p->meta_title ?: $p->title;
            if (! $p->meta_title) {
                $add($w, 'No meta title (falls back to post title).');
            }
            if (mb_strlen($t) > 60) {
                $add($w, 'Title is '.mb_strlen($t).' chars (over 60).');
            }
            $checkDescription($w, $p->meta_description ?: $p->excerpt);
            if (! $p->image) {
                $add($w, 'No featured image.');
            }
            if (($titles[Str::lower($t)] ?? 0) > 1) {
                $add($w, 'Duplicate title with another post.');
            }
            if (($p->status ?? 'published') === 'draft') {
                $add($w, 'Still a draft.');
            }
            $words = str_word_count(strip_tags((string) $p->body));
            if ($words < 300) {
                $add($w, "Thin content ({$words} words).");
            }
            if (empty($p->faqs)) {
                $add($w, 'No FAQs (FAQ schema helps rich results).');
            }
        }

        foreach (Service::all() as $s) {
            $w = "service:{$s->id} ({$s->slug})";
            if (! $s->is_active) {
                $add($w, 'Inactive (hidden from the website).');
            }
            if (mb_strlen((string) $s->description) < 70) {
                $add($w, 'Short or missing description.');
            }
            $words = str_word_count(strip_tags((string) $s->content));
            if ($words < 300) {
                $add($w, "Thin content ({$words} words).");
            }
        }

        foreach (Course::all() as $c) {
            $w = "course:{$c->id} ({$c->slug})";
            if (! $c->image) {
                $add($w, 'No image.');
            }
            if (mb_strlen(strip_tags((string) $c->description)) < 150) {
                $add($w, 'Short description.');
            }
        }

        return ['issue_count' => count($issues), 'issues' => $issues];
    }
}
