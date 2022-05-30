<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // kreiraj 5 postova po korisniku
        $userCollection = User::all();

        $userCollection->each(function ($user) {
            Post::factory(5)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
