<?php
namespace core\services\auth;

use core\entities\User;
use core\forms\auth\SignupForm;
use core\repositories\UserRepository;

class SignupService
{
    private $users;
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function signup(SignupForm $form): void
    {
        //create new user
        $user = User::signup(
            $form->email,
            $form->password
        );

        //save user
        $this->users->save($user);

    }
}