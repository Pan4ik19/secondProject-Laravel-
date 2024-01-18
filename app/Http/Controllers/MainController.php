<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $entries = Entry::all()->where('user_id',$id);
        $categories = Category::all();
        return view('main',['categories'=>$categories, 'id'=>$id, 'entries'=> $entries]);
    }

    public function getAuthUser()
    {
        return Auth::id();
    }

}
