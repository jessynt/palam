<?php

use App\Services\AuthenticationService;

class AuthenticationServiceTest extends TestCase
{
    use InteractsWithDatabase;
    /** @var AuthenticationService $authenticationService */
    private $authenticationService;

    /**
     * @before
     */
    public function init()
    {
        $this->authenticationService = App::make(AuthenticationService::class);
    }

    public function test_create_user()
    {
        // test event has be fired
        $this->expectsEvents(\App\Events\User\UserRegistered::class);
        $data = [
            'username' => 'test_user',
            'email' => 'test@example.com',
            'password' => str_random(16)
        ];
        $this->authenticationService->create($data);
        $this->seeInDatabase('users', ['username' => 'test_user']);
    }

    public function test_use_username_login()
    {
        // test event has be fired
        $this->expectsEvents(\App\Events\User\UserLoggedEvent::class);
        $login = $this->authenticationService->login(['username' => 'Admin', 'password' => '11111111']);
        $this->assertTrue($login);
    }

    public function test_use_wrong_password_login()
    {
        // test event has be fired
        $this->doesntExpectEvents(\App\Events\User\UserLoggedEvent::class);
        $login = $this->authenticationService->login(['username' => 'Admin', 'password' => str_random(10)]);
        $this->assertFalse($login);
    }

    public function test_use_email_login()
    {
        // test event has be fired
        $this->expectsEvents(\App\Events\User\UserLoggedEvent::class);
        $login = $this->authenticationService->login(['email' => 'admin@admin.com', 'password' => '11111111']);
        $this->assertTrue($login);
    }

    public function test_user_login_with_remember()
    {
        // test event has be fired
        $this->expectsEvents(\App\Events\User\UserLoggedEvent::class);
        $login = $this->authenticationService->login(['email' => 'admin@admin.com', 'password' => '11111111', 'remember' => '1']);
        $user = Auth::user();
        $this->assertTrue($login);
        $this->assertNotNull($user['remember_token']);
    }
}