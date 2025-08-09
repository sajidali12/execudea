<?php
  
namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Post extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'image', 'author_name', 'meta_title', 'meta_description', 
        'meta_keywords', 'slug', 'excerpt', 'faqs'
    ];

    protected $casts = [
        'faqs' => 'array'
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = static::generateUniqueSlug($post->title);
            }
            if (empty($post->meta_title)) {
                $post->meta_title = $post->title;
            }
            if (empty($post->excerpt)) {
                $post->excerpt = Str::limit(strip_tags($post->body), 160);
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title') && empty($post->slug)) {
                $post->slug = static::generateUniqueSlug($post->title);
            }
            if ($post->isDirty('title') && empty($post->meta_title)) {
                $post->meta_title = $post->title;
            }
            if ($post->isDirty('body') && empty($post->excerpt)) {
                $post->excerpt = Str::limit(strip_tags($post->body), 160);
            }
        });
    }

    /**
     * Generate a unique slug for the post
     */
    public static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Get the route key for the model.
     * Use slug for public routes, ID for admin routes
     */
    public function getRouteKeyName()
    {
        // Use ID for admin routes, slug for public routes
        if (request()->is('admin/*')) {
            return 'id';
        }
        return 'slug';
    }

    /**
     * Get the post's SEO title
     */
    public function getSeoTitle()
    {
        return $this->meta_title ?: $this->title;
    }

    /**
     * Get the post's SEO description
     */
    public function getSeoDescription()
    {
        return $this->meta_description ?: $this->excerpt ?: Str::limit(strip_tags($this->body), 160);
    }
}    

