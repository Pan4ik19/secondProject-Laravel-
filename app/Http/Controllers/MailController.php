<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\Entry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function entries(Request $request)
    {
        $userId = Auth::check() ? Auth::id() : false;
        $userName = '';
        if($userId){
            $userName = User::all()->where('id',$userId);
        }
        $mail = $request->only('mail');
        $entries = Entry::all()->where('user_id',$userId);
        Mail::to($mail)->send(new DemoMail($userName, $entries));
    }
}
