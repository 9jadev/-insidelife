<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;


class PostsController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id =  auth()->user()->id;
        $posts = Post::where('user_id', $id)->orderBy('created_at','desc')->paginate(10);
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->nick = $request->input('nick');
        $post->tags = $request->input('tags');
        $post->img = $request->input('image');
        $post->category = $request->input('category');
        $post->description = $request->input('description');
        $post->content = $request->input("article-ckeditor");
        $post->views = 0;
        $post->user_id = auth()->user()->id;
        $post->save();
        
        return redirect('/post')->with('success', 'Post Created');
       // return auth()->user()->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $this->counting($id);
        $toposts = $this->sidehome();
        return view('post.show')->with('post', $post)->with('toposts' , $toposts);
    }

    private function sidehome(){
        $toposts = DB::table('posts')->orderBy('views','desc')->take(10)->get();
        return $toposts;
    }
        
    private function counting($id){
        $post = Post::find($id);
        // $post->views++;
        // $post->save();
        $post->views = $post->views + 1;
        $post->save(); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id ){
            return redirect('/post')->with('error', 'Unauthorized Page');    
        }
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->nick = $request->input('nick');
        $post->tags = $request->input('tags');
        $post->img = $request->input('image');
        $post->category = $request->input('category');
        $post->description = $request->input('description');
        $post->content = $request->input("article-ckeditor");
        $post->save();
         
        return redirect('/post')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id ){
            return redirect('/post')->with('error', 'Unauthorized Page');    
        }
        $post->delete();
        return redirect('/post')->with('success', 'Post Deleted');
    }
}
