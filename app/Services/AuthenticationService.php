<?php
namespace App\Services;

use App\Events\User\UserLoggedEvent;
use App\Events\User\UserRegistered;
use App\Repositories\UserRepository;
use Auth;
use Event;
use Illuminate\Contracts\Auth\Guard;

class AuthenticationService
{
    /** @var Guard */
    private $auth;

    private $userRepository;

    /**
     * AuthenticationRepository constructor.
     *
     * @param Guard $auth
     * @param UserRepository $userRepository
     */
    public function __construct(Guard $auth, UserRepository $userRepository)
    {
        $this->auth = $auth;
        $this->userRepository = $userRepository;
    }


    /**
     * @param $data
     * @return \App\Models\User
     */
    public function create($data)
    {
        if ($user = $this->userRepository->create($data)) {
            Event::fire(new UserRegistered($user));
        }
        return $user;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function login($data)
    {
        $remember = array_key_exists('remember', $data);
        array_forget($data, 'remember');
        if ($login = $this->auth->attempt($data, $remember)) {
            Event::fire(new UserLoggedEvent(Auth::user()));
        }
        return $login;
    }
}