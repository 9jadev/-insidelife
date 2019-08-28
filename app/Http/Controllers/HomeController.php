<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id =  auth()->user()->id;
       
        $posts = Post::where('user_id', $id)->orderBy('created_at','desc')->paginate(1);
        return view('post.index')->with('posts', $posts);
    }

    public function getu()
    {
        
        return 12132;
    }
}
