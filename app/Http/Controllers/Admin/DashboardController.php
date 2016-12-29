<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class DashboardController extends Controller
{
    /** @var PostRepository */
    protected $postRepository;

    /**
     * DashboardController constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $latestPosts = $this->postRepository->latest(5);

        return view('admin.dashboard', compact('latestPosts'));
    }
}
