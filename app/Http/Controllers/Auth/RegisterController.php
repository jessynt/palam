<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Services\AuthenticationService;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /** @var AuthenticationService $authenticationService */
    private $authenticationService;


    /**
     * Create a new controller instance.
     *
     * @param AuthenticationService $authenticationService
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param UserRegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(UserRegisterRequest $request)
    {
        if ($user = $this->authenticationService->create($request->all())) {
            return redirect(route('auth.login'))->withFlashSuccess('注册成功,立即登录吧!');
        }
        return redirect()->back()->withInput()->withError('未知错误!');
    }
}