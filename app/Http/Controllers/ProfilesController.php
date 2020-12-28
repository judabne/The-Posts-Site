<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($id)
    {
        $user = User::findorfail($id);
        $posts = Post::whereIn('user_id', $user)->latest()-> get();

        return view('profiles.showprofile', compact("user", "posts"));

    }
}
