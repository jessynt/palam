<?php
namespace App\Services;

use Auth;
use Event;
use App\Events\User\UserLoggedEvent;
use App\Events\User\UserRegistered;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard;

class AuthenticationService
{
    /** @var Guard */
    private $auth;

    private $userRepository;

    /**
     * AuthenticationRepository constructor.
     *
     * @param Guard          $auth
     * @param UserRepository $userRepository
     */
    public function __construct(Guard $auth, UserRepository $userRepository)
    {
        $this->auth = $auth;
        $this->userRepository = $userRepository;
    }


    /**
     * @param $data
     * @return bool|static
     */
    public function create($data)
    {
        if ($user = $this->userRepository->create($data)) {
            Event::fire(new UserRegistered($user));
            return $user;
        }
        return false;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function login($data)
    {
        $remember = array_key_exists('remember', $data);
        array_forget($data, 'remember');
        if ($this->auth->attempt($data, $remember)) {
            Event::fire(new UserLoggedEvent(Auth::user()));
            return true;
        }
        return false;
    }
}