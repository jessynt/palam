<?php

namespace App\Api\Transformers;

use App\Models\Category;
use App\Models\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'category', 'tags',
    ];

    /**
     * Transform a response with a transformer.
     *
     * @param Post $post
     *
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id' => $post['id'],
            'slug' => $post['slug'],
            'title' => $post['title'],
            'description' => $post['description'],
            'body' => $post['body'],
            'updated_at' => $post['updated_at']->toDateTimeString(),
            'created_at' => $post['created_at']->toDateTimeString(),
        ];
    }

    public function includeCategory(Post $post)
    {
        return $this->item($post['category'], new CategoryTransformer());
    }
    public function includeTags(Post $post)
    {
        return $this->collection($post['tags'], new TagTransformer());
    }
}
