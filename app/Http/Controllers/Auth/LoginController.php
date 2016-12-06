<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\AuthenticationService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /** @var AuthenticationService $authenticationService */
    private $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->authenticationService = $authenticationService;
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);
        if ($this->authenticationService->login($credentials)) {
            return $this->sendLoginResponse($request);
        }

        if (!$lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        //登录方式判断 手机号码/邮箱/用户名
//        $field = Validator::make($request->all(), [
//            $this->username() => 'zh_mobile'
//        ])->passes() ? 'mobile' : (filter_var($request->input($this->username()), FILTER_VALIDATE_EMAIL) ? 'email' : 'username');
        $field = filter_var($request->input($this->username(), FILTER_VALIDATE_EMAIL) ? 'email' : 'username');
        $credentials = array_merge([$field => $request->input($this->username())], $request->only('password', 'remember'));
        return $credentials;
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'login';
    }
}
