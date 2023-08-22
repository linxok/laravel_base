<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags =$data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);


        return $post;
//        foreach ($tags as $tag){
//            PostTag::firsOrCreate([
//               'tag_id' => $tag,
//               'post_id' => $post->id
//            ]);
//        }

    }

    public function update($post ,$data)
    {
        $tags =$data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

    }

}
