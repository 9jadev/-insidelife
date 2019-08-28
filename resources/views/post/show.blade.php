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
    <div class="container">
    
        <div class="row  mb-2">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Your Post content
                </h3>
                {{-- <div class="jumbotron">
                    <h1 class="display-4">Dear {{ Auth::user()->name }}</h1>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                </div> --}}
                  
                <div class="blog-post">
                    <h2 class="blog-post-title"> {{ $post->title}} </h2>
                    <p class="blog-post-meta"> {{ date('M j, Y', strtotime($post->created_at)) }} <a href="#">Jacob</a></p>

                    {!! $post->content !!}
                        <p style=" height:10px"> </p>
                        <hr>
                        <p style=" height:40px"> </p>
                        @if (!Auth::guest())
                            @if (Auth::user()->id == $post->user_id)
                                    <hr>
                                    <a href="/post/{{$post->id}}/edit" class="btn btn-success"> Edit </a>
                                    <button href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"> Delete </button>
                                    
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">DELETE POST</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('post.destroy',$post->id) }}" method="POST" class="float-right">
                                                        @csrf
                                                        Are you Sure you wan to delete this post.                         
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <button type="submit" class="btn btn-danger">Delete</button>    
                                                </form>            
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    
                                            </div>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    
                            @endif
                        @endif
                        <p style="height: 10px;"> </p>

                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                  <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                  <a class="a2a_button_facebook"></a>
                                  <a class="a2a_button_twitter"></a>
                                  <a class="a2a_button_email"></a>
                                  <a class="a2a_button_whatsapp"></a>
                                  <a class="a2a_button_telegram"></a>
                            </div>
                            <p style="height: 10px;"> </p>
                            <div id="disqus_thread"></div>                            
                      
                </div><!-- /.blog-post -->
               
            </div>
            <div class="col-md-4" style="margin-top: 80px">
                    @if (!Auth::guest())
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/home"> Home </a></li>
                            <li class="list-group-item"><a href="/post/create"> Create post</a> </li>
                        </ul>
                        <hr>
                    @endif
                    @if (count($toposts) > 0)
                        <h4 class="font-italic">Other Post</h4>
                          <ol class="list-unstyled mb-0">
                                   @foreach ($toposts as $topost)
                                       <li><a href="{{ url('post/'.$topost->id) }}">{{ $topost->title }}</a></li>
                                   @endforeach
                          </ol> 
                    @endif
                    
            </div>
        </div>

        <p style="height: 10px;"> </p>
    </div>
@endsection

@section('sha')

@endsection

@section('create')
 <script src="{{ asset('js/app.js') }}"> </script>  
 <script async src="https://static.addtoany.com/menu/page.js"></script>

    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        
        var disqus_config = function () {
        this.page.url = '{{ url()->current() }}';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://inside-life.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                
@endsection