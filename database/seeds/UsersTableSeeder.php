<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'username'  => 'Admin',
                'email'     => 'admin@admin.com',
                'password'  => bcrypt('11111111'),
                'confirmed' => true
            ]
        );
    }
}
