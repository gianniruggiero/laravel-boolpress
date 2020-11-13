<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;


class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();
        $tagCount = count($tags);
        
        $posts = Post::all();
        foreach($posts as $post) {
            $postTagsNumber = rand(1, $tagCount);
            $postTags = Tag::inRandomOrder()->limit($postTagsNumber)->get();
            foreach ($postTags as $postTag){
                $post->tags()->attach($postTag->id);
            }
        };


    }
}
