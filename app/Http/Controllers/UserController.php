<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function registration(Request $request)
    {
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        $validateFields = $request->validate([
            'name' => 'required',
            'secondName' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $validateFields['name'];
        $user->second_name = $validateFields['secondName'];
        $user->email = $validateFields['email'];
        $user->password = $validateFields['password'];
        $user->save();
        return redirect(route('user.private'));
    }

    public function login(Request $request)
    {
        if (Auth::check()){
            return redirect(route('user.private'));
        }
        $formFields = $request->only('email','password');
        if(Auth::attempt($formFields)){
            return redirect(route('user.private'));
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
}
