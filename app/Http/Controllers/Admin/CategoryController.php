<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use Redirect;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $condition = [];
        if ($request->get('keyword')) {
            $condition['name'] = $request->get('keyword');
        }
        $categories = $this->categoryRepository->getCategoriesPaginated(10, $condition);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->categoryRepository->create($request->intersect('name'));

        return Redirect::route('admin.category.index')->withFlashSuccess('创建成功!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category              $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($this->categoryRepository->update($request->intersect('name'), $category)) {
            return Redirect::route('admin.category.index')->withFlashSuccess('修改成功!');
        }

        return Redirect::back()->withInput()->withErrors('修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $post_count = $category->posts()->count();
        if ($post_count > 0) {
            return Redirect::back()->withErrors('该分类下还有'.$post_count.'篇文章，请先移动文章后再删除');
        }
        if ($category->delete()) {
            return Redirect::back()->withFlashSuccess('删除成功');
        }

        return Redirect::back()->withErrors('删除失败');
    }
}
