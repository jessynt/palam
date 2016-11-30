<?php
use App\Models\Category;
use App\Repositories\CategoryRepository;

/**
 * Date: 2016/11/15
 * Time: 下午5:57
 */
class CategoryRepositoryTest extends TestCase
{
    use InteractsWithDatabase;

    /** @var CategoryRepository $categoryRepository */
    protected $categoryRepository;

    protected $categories;

    /**
     * @before
     */
    public function init()
    {
        $this->categoryRepository = App::make(CategoryRepository::class);
        $this->categories = factory(Category::class, 100)->create();
    }

    public function test_get_categories_paginated()
    {
        $categories = $this->categoryRepository->getCategoriesPaginated(1);
        $this->assertEquals($categories->total(), Category::count());
    }

    public function test_get_category_by_name()
    {
        $random_category = collect($this->categories)->random();
        $category = $this->categoryRepository->get($random_category->name);
        $this->assertEquals($random_category->name, $category->name);
    }

    public function test_create_category()
    {
        $data = ['name' => 'test category'];
        $this->categoryRepository->create($data);
        $category = $this->categoryRepository->get($data['name']);
        $this->assertTrue($category->exists);
    }

    public function test_update_category()
    {
        $data = ['name' => 'test update category'];
        $category = Category::first();

        $this->assertTrue($this->categoryRepository->update($data, $category));
    }

    public function test_get_all_categories()
    {
        $categories = $this->categoryRepository->getAll();

        $this->assertEquals($categories->count(), Category::count());
    }

    public function test_get_model()
    {
        $this->assertEquals(get_class($this->categoryRepository->getModel()), Category::class);
    }
}