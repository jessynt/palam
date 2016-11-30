<?php
namespace App\Http\Controllers\Home;

use App;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;

class HomeController extends Controller
{
    protected $postRepository;

    /**
     * HomeController constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        \Debugbar::disable();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @throws \InvalidArgumentException
     */
    public function index()
    {
        $posts = $this->postRepository->getPostsPaginated(15);
        return view('home.index', compact('posts'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show($slug)
    {
        $post = $this->postRepository->get($slug);
        return view('post.show', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function archives()
    {
        $posts = $this->postRepository->archives();
        $posts = $posts->groupBy(function ($post) {
            return $post->created_at->year;
        });
        return view('home.archives', compact('posts'));
    }

    public function tags()
    {
        /** @var TagRepository $tagRepository */
        $tagRepository =  App::make(TagRepository::class);
        $tags = $tagRepository->getAll();

        return view('home.tags', compact('tags'));
    }
}
