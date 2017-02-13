<?php
namespace Test\Unit\Repositories;
use App;
use App\Models\Post;
use App\Repositories\PostRepository;
use Tests\InteractsWithDatabase;
use Tests\TestCase;

/**
 * Date: 2016/11/15
 * Time: 下午4:58.
 */
class PostRepositoryTest extends TestCase
{
    use InteractsWithDatabase;

    /** @var PostRepository $postRepository */
    protected $postRepository;

    /** @var Post $posts */
    protected $posts;

    /**
     * @before
     */
    public function init()
    {
        $this->postRepository = App::make(PostRepository::class);
        $this->posts = factory(Post::class, 100)->create();
    }

    public function test_get_latest_posts()
    {
        $actual = $this->postRepository->latest(10)->count();
        $this->assertEquals(10, $actual);
    }

    public function test_get_post_by_slug()
    {
        $random_post = collect($this->posts)->random();
        $post = $this->postRepository->get($random_post->slug);
        $this->assertEquals($random_post->title, $post->title);
    }

    public function test_get_posts_paginated()
    {
        $posts = $this->postRepository->getPostsPaginated(1);
        $this->assertEquals($posts->currentPage(), 1);
        $this->assertEquals($posts->hasMorePages(), true);

        $posts = $this->postRepository->getPostsPaginated(1, ['id' => 2]);
        $this->assertEquals($posts->currentPage(), 1);
        $this->assertEquals($posts->hasMorePages(), false);
    }

    public function test_get_posts_archives()
    {
        $archives = $this->postRepository->archives();

        $this->assertEquals($archives->count(), Post::count());
    }

    public function test_get_model()
    {
        $this->assertEquals(get_class($this->postRepository->getModel()), Post::class);
    }

    public function test_create_post()
    {
        $this->be(\App\Models\User::first());
        $data = [
            'title' => 'Test Title',
            'slug' => 'test_post',
            'body' => '#Test',
            'category_id' => '1',
            'tags_id' => [1, 2],
        ];
        $post = $this->postRepository->create($data);

        $this->assertNotFalse($post);
        $this->assertEquals(2, $post->tags->count());
        $this->assertInstanceOf(Post::class, $post);
    }

    public function test_update_post()
    {
        $data = [
            'title' => 'Test update Title',
            'slug' => 'test_update_post',
            'body' => '#Test update',
            'category_id' => '1',
            'tags_id' => [2],
        ];

        $post = Post::first();
        $this->assertNotFalse($this->postRepository->update($data, $post));
    }
}
