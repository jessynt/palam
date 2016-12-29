<?php

namespace App\Api\Transformers;

use App\Models\Tag;
use League\Fractal\TransformerAbstract;

class TagTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var  array
     */
    protected $availableIncludes = ['posts'];

    /**
     * Transform a response with a transformer.
     *
     * @param Tag $tag
     *
     * @return array
     */
    public function transform(Tag $tag)
    {
        return [
            'name' => $tag['name'],
            'color' => $tag['color']
        ];
    }

    public function includePosts(Tag $tag)
    {
        return $this->collection($tag->posts, new PostTransformer);
    }
}
