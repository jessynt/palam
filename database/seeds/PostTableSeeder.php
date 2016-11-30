<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title'         => 'Hello,World!',
            'slug'          => 'slim',
            'category_id'   => '1',
            'body'          => 'This is your first post. Edit or delete it, then start writing!',
            'body_original' => 'This is your first post. Edit or delete it, then start writing!',
            'user_id'       => 1,
            'slug'          => 'hello-world'
        ];
        $data['description'] = excerpt_more($data['body']);
        Post::create($data);
    }
}
