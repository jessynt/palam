<?php

namespace App\Events\User;

use App\Models\User;

class UserRegistered
{

    /** @var User $user */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
