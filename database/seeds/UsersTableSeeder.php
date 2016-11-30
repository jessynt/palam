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
                'email'     => 'xr5299@gmail.com',
                'mobile'    => '18888888888',
                'password'  => bcrypt('11111111'),
                'confirmed' => true
            ]
        );
    }
}
