<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    public function __construct(
        private AuthService $auth
    ){}



    public function register(
        RegisterRequest $request
    )
    {

        $this->auth->register(
            $request->validated()
        );


        return redirect()
            ->route('login')
            ->with(
                'success',
                'ثبت نام انجام شد'
            );

    }





    public function login(
        LoginRequest $request
    )
    {

        $this->auth->login(
            $request->email,
            $request->password,
            $request->remember ?? false
        );


        return redirect()
            ->route('dashboard');

    }



    public function logout()
    {

        $this->auth->logout();


        return redirect()
            ->route('login');

    }

}
