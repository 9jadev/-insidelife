@extends('layouts.app')

@section('slider')
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Welcome to InsideLife </h1>
        <p class="lead my-3"> The platform where we share our personal life stories with the sole purpose of enlightingment.</p>
        <p class="lead mb-0"><a href="aboutus" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row  mb-2">
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          Amazing Stories 
        </h3>
      <div class="row">
        {{-- this is a blog oist --}}
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
                                        <a href="post/{{ $post->id }}" class="stretched-link">Continue reading</a>
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
                                            make a post below <br>
                                            <p style="height: 40px;"> </p>
                                            <a href="{{ url("post/create") }}" class="btn btn-success btn-success-lg">Create Post </a>
                                        </div>
                                        
                                    </div>
                                    <div class="col-auto d-none d-lg-block">
                                        <img src="https://via.placeholder.com/300x250.png?text=No+Post+Available" width="300" height="250"/>
                                    </div>
                            </div>
                    </div>
                        
          @endif
      </div>
      

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      

      <div class="p-4">
        <h4 class="font-italic">Other Post</h4>
        <ol class="list-unstyled mb-0">
          
          @foreach ($toposts as $topost)
              <li><a href="{{ url('post/'.$topost->id) }}">{{ $topost->title }}</a></li>
          @endforeach
        </ol>
      </div>

      {{-- <div class="p-4">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div> --}}
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->
@endsection

@section('create')
    <script src="{{ asset('js/app.js') }}"> </script>    
    <script type="text/javascript" src="https://www.s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d63cc5971cb1850"></script>        
@endsection