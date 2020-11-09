<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;
use App\User;
use Faker\Generator as Faker;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $user = User::inRandomOrder()->first();
            $newPost = new Post;
            $newPost->user_id = $user->id;
            $newPost->title = $faker->sentence(6, true);
            $newPost->post_text = $faker->paragraph(6, true);
            $newPost->abstract = $faker->text(100);
            $newPost->slug = Str::of($newPost->title)->slug('-');
            $newPost->save();
        }
    }
}
