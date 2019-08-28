<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;


class pagesController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->orderBy('created_at','desc')->paginate(10);
        $toposts = $this->sidehome();
        return view('index')->with('posts' , $posts)->with('toposts' , $toposts);
    }
    private function sidehome(){
        $toposts = DB::table('posts')->orderBy('views','desc')->take(10)->get();
        return $toposts;
    }
    public function cate($cate){
        $posts = DB::table('posts')->where('category', $cate)->orderBy('created_at','desc')->paginate(10);
        $toposts = $this->sidehome();
        return view('index')->with('posts' , $posts)->with('toposts' , $toposts);
    }
}
