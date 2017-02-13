<?php
namespace Test\Unit\Repositories;
use App;
use App\Models\Tag;
use App\Repositories\TagRepository;
use Tests\InteractsWithDatabase;
use Tests\TestCase;

class TagRepositoryTest extends TestCase
{
    use InteractsWithDatabase;
    /** @var array $tags */
    private $tags;
    /** @var TagRepository $tagRepository */
    private $tagRepository;

    /**
     * @before
     */
    public function init()
    {
        $this->tagRepository = App::make(TagRepository::class);
        $this->tags = factory(Tag::class, 100)->create();
    }

    public function test_get_tags_paginated()
    {
        $tags = $this->tagRepository->getTagsPaginated(1);
        $this->assertEquals($tags->total(), Tag::count());
    }

    public function test_create_tag()
    {
        $data = ['name' => 'test tag'];
        $this->tagRepository->create($data);
        $this->assertDatabaseHas('tags', $data);
    }

    public function test_update_tag()
    {
        $data = ['name' => 'test update tag'];
        $tag = Tag::first();

        $this->assertTrue($this->tagRepository->update($data, $tag));
    }

    public function test_destroy_tag()
    {
        $tag = Tag::withCount('posts')->first();
        $destroy = $this->tagRepository->destroy($tag);
        if ($tag->posts_count > 0) {
            $this->assertFalse($destroy);
        } else {
            $this->assertTrue($destroy);
        }
    }

    public function test_get_model()
    {
        $this->assertEquals(get_class($this->tagRepository->getModel()), Tag::class);
    }
}