<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Tag;
use App\Repositories\TagRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\CreateTagRequest;
use App\Http\Requests\Admin\Tag\UpdateTagRequest;

class TagController extends Controller
{
    /** @var TagRepository $tagRepository */
    private $tagRepository;

    /**
     * TagController constructor.
     *
     * @param TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = $this->tagRepository->getTagsPaginated(20);
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTagRequest $request
     * @return mixed
     */
    public function store(CreateTagRequest $request)
    {
        $this->tagRepository->create($request->intersect('name', 'color'));
        return Redirect::route('admin.tag.index')->withFlashSuccess('创建成功!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTagRequest $request
     * @param Tag              $tag
     * @return \Illuminate\Http\RedirectResponse|Redirect
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        if ($this->tagRepository->update($request->intersect('name', 'color'), $tag)) {
            return Redirect::route('admin.tag.index')->withFlashSuccess('修改成功!');
        }
        return Redirect::back()->withInput()->withErrors('修改失败');
    }

    /**
     * Remove the specified resource from storage.
     * @param Tag $tag
     * @return $this
     */
    public function destroy(Tag $tag)
    {
        if ($this->tagRepository->destroy($tag)) {
            return Redirect::back()->withFlashSuccess('删除成功');
        }
        return Redirect::back()->withErrors('删除失败');
    }
}