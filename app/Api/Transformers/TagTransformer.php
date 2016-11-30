<?php


namespace App\Api\Transformers;


use App\Models\Tag;
use League\Fractal\TransformerAbstract;

class TagTransformer extends TransformerAbstract
{
    /**
     * Transform a response with a transformer.
     *
     * @param Tag $tag
     * @return array
     */
    public function transform(Tag $tag)
    {
        return [
            'name' => $tag['name']
        ];
    }
}