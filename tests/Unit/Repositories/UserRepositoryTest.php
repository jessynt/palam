<?php
namespace Test\Unit\Repositories;
use App;
use App\Models\User;
use App\Repositories\UserRepository;
use Tests\InteractsWithDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use InteractsWithDatabase;
    /** @var UserRepository $userRepository */
    private $userRepository;

    /**
     * @before
     */
    public function init()
    {
        $this->userRepository = App::make(UserRepository::class);
    }

    public function test_create_user()
    {
        $data = [
            'username' => 'test_user',
            'email' => 'test@example.com',
            'password' => str_random(16)
        ];
        $this->userRepository->create($data);
        $this->assertDatabaseHas('users', ['username' => 'test_user']);
    }

    public function test_get_model()
    {
        $this->assertEquals(get_class($this->userRepository->getModel()), User::class);
    }
}