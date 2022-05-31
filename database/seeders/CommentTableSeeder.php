<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allPosts = Post::all();
        $allUserIds = User::pluck('id');

        $allPosts->each(function($post) use ($allUserIds) {
            Comment::factory(6)->create([
                'user_id' => $allUserIds->random(),
                'post_id' => $post->id
            ]);
        });        
    }
}
