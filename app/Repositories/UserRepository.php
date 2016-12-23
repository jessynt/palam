<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    /** @var User 依赖注入 */
    protected $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getModel()
    {
        return $this->user;
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        $user = User::create([
            'username'          => $data['username'],
            'email'             => $data['email'],
            'password'          => bcrypt($data['password']),
            'confirmation_code' => str_random(30)
        ]);
        return $user;
    }
}