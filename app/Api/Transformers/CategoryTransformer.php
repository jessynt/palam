<?php

namespace App\Api\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
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
     * @param Category $category
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'name' => $category['name'],
        ];
    }

    public function includePosts(Category $category)
    {
        return $this->collection($category->posts, new PostTransformer);
    }
}