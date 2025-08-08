<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class GeneratePostSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:generate-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for posts that do not have them';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating slugs for posts without slugs...');

        $posts = Post::whereNull('slug')->orWhere('slug', '')->get();

        if ($posts->count() === 0) {
            $this->info('All posts already have slugs!');
            return;
        }

        $this->withProgressBar($posts, function ($post) {
            $post->slug = Post::generateUniqueSlug($post->title);
            $post->save();
        });

        $this->newLine(2);
        $this->info("Done! Generated slugs for {$posts->count()} posts.");
    }
}
