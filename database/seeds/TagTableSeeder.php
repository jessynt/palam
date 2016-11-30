<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Tag();
        $initial_tag = ['PHP', 'Laravel'];

        foreach ($initial_tag as $item) {
            $category->create(['name' => $item]);
        }
    }
}
