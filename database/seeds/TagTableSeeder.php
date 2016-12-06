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
        $initial_tag = [
            ['name' => 'PHP', 'color' => '#8892bf'],
            ['name' => 'Laravel', 'color' => '#f4645f']
        ];

        foreach ($initial_tag as $item) {
            $category->create($item);
        }
    }
}
