@extends('layouts.app')

@section('slider')
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Welcome to InsideLife </h1>
        <p class="lead my-3"> The platform where we share our personal life stories with the sole purpose of enlightingment.</p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
    
        <div class="row  mb-2">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                   Amazing Stories 
                </h3>
                  <div class="jumbotron">
                    <h1 class="display-4">Dear {{ Auth::user()->name }}</h1>
                    <hr class="my-4">
                    <p> Welcome to inside life we hope you share a story to help today.</p>
                    <a class="btn btn-primary btn-lg" href="{{ url('post/create') }}" role="button">Add Post</a>
                </div>
                @include('inc.message') 
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="col-md-12">
                            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <strong class="d-inline-block mb-2 text-success">{{ $post->category }}</strong>
                                        <h3 class="mb-0">{{ $post->title }}</h3>
                                    <div class="mb-1 text-muted"> {{ date('M j, Y', strtotime($post->created_at)) }} </div>
                                        <div class="mb-auto">
                                            {{ $post->description }}
                                        </div>
                                        <a href=" post/{{ $post->id }}" class="stretched-link">Continue reading</a>
                                    </div>
                                    <div class="col-auto d-none d-lg-block">
                                        <img src="{{ $post->img }}" width="300" height="250"/>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }} 
                @else
                    <div class="col-md-12">
                            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <strong class="d-inline-block mb-2 text-success"> No post avaiable</strong>
                                        <h3 class="mb-0">No post available</h3>
                                       
                                        <div class="mb-auto">
                                            
                                             <p style="height: 10px;"> </p>
                                            <a href="{{ url('post/create') }}" class="btn btn-info btn-info-lg">Create Post</a>
                                        </div>
                                        
                                    </div>
                                    <div class="col-auto d-none d-lg-block">
                                        <img src="https://via.placeholder.com/300x250.png?text=No+Post+Available" width="300" height="250"/>
                                    </div>
                            </div>
                        </div>
                        
                @endif 
               
            </div>
            <div class="col-md-4" style="margin-top: 80px">
                 <ul class="list-group">
                    <li class="list-group-item"><a href="/home"> Home </a></li>
                    <li class="list-group-item"><a href="/post/create"> Create post</a> </li>
                </ul>
            </div>
        </div>

        <p style="height: 10px;"> </p>
    </div>
@endsection

@section('create')
    <script src="{{ asset('js/app.js') }}"> </script>            
@endsection
