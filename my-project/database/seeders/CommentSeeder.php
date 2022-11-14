<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::select('id')->get();
        $users = User::select('id')->get();

        for($i = 0; $i < 500; $i++){
            $post = fake()->randomElement($posts);
            $user = fake()->randomElement($users);

            Comment::factory()
                ->count(1)
                ->create([
                    'post_id' => $post,
                    'author_id' => $user,
                ]);
        }
    }
}
