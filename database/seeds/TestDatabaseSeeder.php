<?php
use Illuminate\Database\Seeder;

/**
 * Date: 2016/11/15
 * Time: 下午3:47
 */
class TestDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}