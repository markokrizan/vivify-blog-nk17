<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allTags = Tag::factory(5)->create();

        $allPosts = Post::all();

        $allPosts->each(function($post) use ($allTags) {
            $post->tags()->attach(
                $allTags->random(3)->pluck('id')->all()
            );
        });
    }
}
