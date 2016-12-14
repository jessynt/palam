<?php
namespace App\Repositories;

use Auth;
use App\Models\Tag;
use App\Models\Post;
use App\Services\Parsedowner;

class PostRepository extends Repository
{
    /** @var  Post $post */
    protected $post;

    /**
     * PostRepository constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param $flag
     * @return Post
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function get($flag)
    {
        if (!$post = $this->post->with('category', 'tags')->where('slug', $flag)->firstOrFail()) {
            $post = Post::findOrFail($flag);
        }
        return $post;
    }

    /**
     *
     * @param $data
     * @return Post|bool
     */
    public function create($data)
    {
        $Parsedowner = new Parsedowner();
        $tag_ids = [];
        /** @var array $tags */
        $tags = array_key_exists('tags_id', $data) ? $data['tags_id'] : [];
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $tag = Tag::firstOrCreate(['name' => $tag]);
                $tag_ids[] = $tag->id;
            }
        }

        $data['user_id'] = Auth::id();
        $data['body_original'] = $data['body'];
        $data['body'] = $Parsedowner->toHTML($data['body_original']);
        $data['description'] = $Parsedowner->toHTML(excerpt_more($data['body_original']));
        if ($post = $this->post->create($data)) {
            $post->tags()->sync($tag_ids);
            return $post;
        }
        return false;
    }

    /**
     * 获取文章并分页
     *
     * @param        $per_page
     * @param array $condition
     * @param string $order_by
     * @param string $sort
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws \InvalidArgumentException
     */
    public function getPostsPaginated($per_page, array $condition = [], $order_by = 'id', $sort = 'DESC')
    {
        $posts = $this->post->with('user', 'category', 'tags')->where($condition)->orderBy($order_by, $sort)->paginate($per_page);
        return $posts;
    }

    /**
     * @param      $data
     * @param Post $post
     * @return bool
     */
    public function update($data, Post $post)
    {
        $Parsedowner = new Parsedowner();
        $tag_ids = [];
        /** @var array $tags */
        $tags = array_key_exists('tags_id', $data) ? $data['tags_id'] : [];
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $tag = Tag::firstOrCreate(['name' => $tag]);
                $tag_ids[] = $tag->id;
            }
        }

        $data['body_original'] = $data['body'];
        $data['body'] = $Parsedowner->toHTML($data['body_original']);
        $data['description'] = $Parsedowner->toHTML(excerpt_more($data['body_original']));
        if ($post->update($data)) {
            $post->tags()->sync($tag_ids);
            return $post;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function archives()
    {
        return $this->post->select([
            'id',
            'title',
            'slug',
            'created_at',
        ])->orderBy('created_at', 'DESC')->get();
    }

    /**
     * @return Post
     */
    public function getModel()
    {
        return $this->post;
    }
}
