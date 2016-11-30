<?php
namespace App\Api\Controllers;

use App\Api\Transformers\PostTransformer;
use App\Repositories\PostRepository;

class PostController extends BaseController
{
    /**
     * Post Repository.
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostController constructor.
     *
     * @param PostRepository $postRepository Post Repository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Index.
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function index()
    {
        $posts = $this->postRepository->getPostsPaginated(20);
        return $this->paginator($posts, new PostTransformer());
    }

    /**
     * Show.
     *
     * @param string $slug
     *
     * @return mixed
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show($slug)
    {
        $post = $this->postRepository->get($slug);

        return $this->item($post, new PostTransformer());
    }
}
