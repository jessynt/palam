<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Category();
        $initial_category = ['未归类', 'PHP', '随想'];

        foreach ($initial_category as $item) {
            $category->create(['name' => $item]);
        }
    }
}
