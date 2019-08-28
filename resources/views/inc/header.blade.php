<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        {{-- <a class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a> --}}

        <!-- Example split danger button -->
        <div class="btn-group dropright">
            <button type="button" class="btn btn-link">More</button>
            <button type="button" class="btn btn-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
      
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/"> {{ config('app.name', 'Laravel') }} </a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        {{-- <a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a> --}}
        
        <ul class="navbar-nav ml-auto">
                            
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> Add Post </a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                              
                                {{-- --}}
                              
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home" > Dashboard </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
      </div>
    </div>
  </header>

   <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @if (count($cats) > 0)
            @foreach ($cats as $cat)
                <a class="p-2 text-muted" href="{{ url('/category/'.$cat->category) }}">{{$cat->category}}</a>        
            @endforeach
        @endif
    </nav>
  </div>