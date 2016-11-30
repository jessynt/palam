<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Repositories\PageRepository;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /** @var PageRepository $pageRepository */
    private $pageRepository;

    /**
     * PageController constructor.
     *
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.page.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Page $page)
    {

    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * @param Page $page
     */
    public function update(Page $page)
    {

    }

    /**
     * @param Page $page
     */
    public function destroy(Page $page)
    {

    }
}