<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use App\Models\Service;

class SitemapController extends Controller
{
    public function index()
    {
        $base = 'https://execudea.com';

        $urls = collect([
            ['loc' => $base . '/'],
            ['loc' => $base . '/about'],
            ['loc' => $base . '/blog'],
            ['loc' => $base . '/contact'],
            ['loc' => $base . '/courses'],
            ['loc' => $base . '/payload-case-studies'],
        ]);

        Service::where('is_active', true)->get()->each(function ($service) use ($urls, $base) {
            $urls->push(['loc' => $base . '/services/' . $service->slug, 'lastmod' => $service->updated_at]);
        });

        Post::published()->orderByDesc('updated_at')->get()->each(function ($post) use ($urls, $base) {
            $urls->push(['loc' => $base . '/blog/' . $post->slug, 'lastmod' => $post->updated_at]);
        });

        Course::active()->get()->each(function ($course) use ($urls, $base) {
            $urls->push(['loc' => $base . '/courses/' . $course->slug, 'lastmod' => $course->updated_at]);
        });

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $url) {
            $xml .= '  <url><loc>' . htmlspecialchars($url['loc'], ENT_XML1) . '</loc>';
            if (!empty($url['lastmod'])) {
                $xml .= '<lastmod>' . $url['lastmod']->toAtomString() . '</lastmod>';
            }
            $xml .= "</url>\n";
        }
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
