<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegistrationPostRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function registration(RegistrationPostRequest $request)
    {
        if(Auth::check()){
            return redirect(route('main.main'));
        }
        $validateFields = $request->validated();
        $user = User::create($validateFields);
        $user->save();
        return redirect(route('main.main'));
    }

    public function login(LoginPostRequest $request)
    {
        if (Auth::check()){
            return redirect(route('main.main'));
        }
        $formFields = $request->validated();
        if(Auth::attempt($formFields)){
            return redirect(route('main.main'));
        }else{
            return redirect(route('user.login'))->withErrors([
                'email'=>'User is not found!'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('user.login'));
    }

    public function getRegistration()
    {
        return Auth::check() ? redirect(view('/')) : view('registration');
    }
    public function getLogin()
    {
        return Auth::check() ? redirect(view('/')) : view('login');
    }
}
