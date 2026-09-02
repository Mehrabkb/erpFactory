<?php

namespace App\Services;


use App\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthService
{

    public function __construct(
        private UserRepositoryInterface $users
    ){}



    public function register(array $data)
    {
        return $this->users->create($data);
    }



    public function login(
        string $email,
        string $password,
        bool $remember = false
    ): bool {


        $user = $this->users
            ->findByEmail($email);


        if(!$user)
        {
            throw ValidationException::withMessages([
                'email'=>'اطلاعات ورود اشتباه است'
            ]);
        }



        if(!Auth::attempt(
            [
                'email'=>$email,
                'password'=>$password
            ],
            $remember
        ))
        {

            throw ValidationException::withMessages([
                'email'=>'اطلاعات ورود اشتباه است'
            ]);

        }


        request()->session()->regenerate();


        return true;
    }



    public function logout(): void
    {
        Auth::logout();


        request()
            ->session()
            ->invalidate();


        request()
            ->session()
            ->regenerateToken();
    }

}
