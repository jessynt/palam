<?php
namespace App\Api\Controllers;

use App\Repositories\TagRepository;
use App\Api\Transformers\TagTransformer;

class TagController extends BaseController
{
    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * TagController constructor.
     * @param TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function show($name)
    {
        $tag = $this->tagRepository->getTagByName($name);
        return $this->item($tag, new TagTransformer());
    }
}