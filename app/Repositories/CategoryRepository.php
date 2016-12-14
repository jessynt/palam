<?php


namespace App\Repositories;


use App\Models\Category;

class CategoryRepository extends Repository
{
    /** @var Category $category */
    private $category;

    /**
     * CategoryRepository constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param        $per_page
     * @param array  $condition
     * @param string $order_by
     * @param string $sort
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCategoriesPaginated($per_page, array $condition = [], $order_by = 'id', $sort = 'DESC')
    {
        return $this->category->where($condition)->orderBy($order_by, $sort)->withCount('posts')->paginate($per_page);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        $category = $this->category->where(['name' => $name])->first();
        if (!$category) {
            abort(404);
        }
        return $category;
    }

    /**
     * @param $data
     * @return static
     */
    public function create($data)
    {
        return $this->category->create(['name' => $data['name']]);
    }

    /**
     * @param          $data
     * @param Category $category
     * @return bool
     */
    public function update($data, Category $category)
    {
        return $category->update($data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->category->withCount('posts')->get();
    }

    /**
     * @return Category
     */
    public function getModel()
    {
        return $this->category;
    }

    public function getCategoryByName($name)
    {
        $category  = $this->category->where(['name' => $name])->first();
        if (!$category) {
            abort(404);
        }
        return $category;
    }
}