<?php
namespace App\Repositories;


use App\Models\Tag;

class TagRepository extends Repository
{
    private $tag;

    /**
     * TagRepository constructor.
     *
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param        $per_page
     * @param array  $condition
     * @param string $order_by
     * @param string $sort
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTagsPaginated($per_page, array $condition = [], $order_by = 'id', $sort = 'DESC')
    {
        return $this->tag->withCount('posts')->where($condition)->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->tag->withCount('posts')->get();
    }

    /**
     * @param $data
     * @return Tag
     */
    public function create($data)
    {
        return $this->tag->create($data);
    }

    public function getTagByName($name)
    {
        $tag  = $this->tag->where(['name' => $name])->first();
        if (!$tag) {
            abort(404);
        }
        return $tag;
    }

    /**
     * @return Tag
     */
    public function getModel()
    {
        return $this->tag;
    }

    /**
     * @param $data
     * @param $tag
     * @return mixed
     */
    public function update($data, $tag)
    {
        return $tag->update($data);
    }

    /**
     * @param Tag $tag
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $post_count = $tag->posts()->count();
        if ($post_count > 0) {
            return false;
        }
        return $tag->delete();
    }
}