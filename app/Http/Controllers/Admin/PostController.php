<?php
namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\TagRepository;
use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Admin\Post\CreatePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;


class PostController extends Controller
{
    /** @var PostRepository $postRepository */
    private $postRepository;
    /** @var CategoryRepository $categoryRepository */
    private $categoryRepository;
    /** @var TagRepository $tagRepository */
    private $tagRepository;

    /**
     * PostController constructor.
     *
     * @param PostRepository     $postRepository
     * @param CategoryRepository $categoryRepository
     * @param TagRepository      $tagRepository
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \InvalidArgumentException
     */
    public function index()
    {
        $posts = $this->postRepository->getPostsPaginated(20);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $tags = $this->tagRepository->getAll();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $this->postRepository->create($request->intersect(['title', 'body', 'slug', 'category_id', 'tags_id']));
        return Redirect::route('admin.post.index')->withFlashSuccess('创建成功!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = $this->categoryRepository->getAll();
        $tags = $this->tagRepository->getAll();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post              $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->postRepository->update($request->intersect(['title', 'body', 'category_id', 'tags_id']), $post);
        return Redirect::route('admin.post.index')->withFlashSuccess('更新成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
