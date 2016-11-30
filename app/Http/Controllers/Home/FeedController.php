<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class FeedController extends Controller
{
    /** @var PostRepository $postRepository */
    private $postRepository;

    /**
     * FeedController constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function atom()
    {
        $posts = $this->postRepository->getPostsPaginated(20);
        return view('home.feed.atom', compact('posts'));
    }
}