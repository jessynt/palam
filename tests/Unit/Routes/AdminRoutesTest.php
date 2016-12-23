<?php

use App\Models\User;

Class AdminRoutesTest extends TestCase
{
    use InteractsWithDatabase;

    /** @var \App\Models\User $user */
    private $user;

    /**
     * Create the user model test subject.
     *
     * @before
     * @return void
     */
    public function createUser()
    {
        $this->user = factory(User::class)->create();
    }

    public function test_user_cam_access_the_dashboard()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.dashboard'));
        $this->assertEquals(200, $response->status());
    }

    public function test_user_cam_access_the_posts_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.post.index'));
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['posts']);
    }

    public function test_user_cam_access_the_create_post_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.post.create'));
        $this->assertEquals(200, $response->status());
    }

    public function test_user_cam_access_the_edit_post_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.post.edit', ['id' => '1']));
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['post']);
    }

    public function test_user_cam_access_the_categories_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.category.index'));
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['categories']);
    }

    public function test_user_cam_access_the_create_category_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.category.create'));
        $this->assertEquals(200, $response->status());
    }

    public function test_user_cam_access_the_edit_category_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.category.edit', ['id' => '1']));
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['category']);
    }

    public function test_user_cam_access_the_tags_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.tag.index'));
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['tags']);
    }

    public function test_user_cam_access_the_create_tag_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.tag.create'));
        $this->assertEquals(200, $response->status());
    }

    public function test_user_cam_access_the_edit_tag_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('admin.tag.edit', ['id' => '1']));
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['tag']);
    }
}