<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $myposts = Auth::user()->post()->get();
        $likedposts = Auth::user()->like()->get();
        return view('mypages.index')->with(['myposts' => $myposts, 'likedposts' => $likedposts]);
    }
}
