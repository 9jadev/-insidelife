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
                    Your Amazing Stories 
                </h3>
                <div class="jumbotron">
                    <h1 class="display-4">Dear {{ Auth::user()->name }}</h1>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                </div>

                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-header"> Make Post </div>
                        <div class="card-body">
                                <form method="post" action="{{ route('post.update',$post->id) }}">
                                    @csrf

                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="form-group">
                                            <label for="exampleInputTitle">Title</label>
                                            <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp" name="title" value="{{ $post->title }}" placeholder="Enter title" required="yes" />
                                            <small id="titleHelp" class="form-text text-muted"> You would need to enter a post title.</small>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputTitle">Creator name</label>
                                            <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp" value="{{$post->nick}}" name="nick" placeholder="Enter title" required="yes" />
                                            <small id="titleHelp" class="form-text text-muted"> You would need to enter a creator alias nickname.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="seoTags">Seo tags</label>
                                            <input type="text" class="form-control form-control-lg" id="seoTags" aria-describedby="seoTags" name="tags" value="{{ $post->tags }}" placeholder="Enter Seo tags" required="yes" />
                                            <small id="seoTags" class="form-text text-muted"> You would need to enter some Seo tag (fun ,election).</small>
                                        </div>
                                        <img src="{{$post->img}}"  class="img-responsive img-fluid" width="100" height="100" />                
                                        <div class="form-group">
                                            <label for="uploadss">Image placeholder</label> 
                                            <input type="text" class="form-control" id="uploadss" aria-describedby="imageP" name="image" value="{{$post->img}}" placeholder="Enter Image placeholder" required="yes" />
                                            <small id="uploadss" class="form-text text-muted"> Enter image place holder .</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="CategorySelect1">Select Category</label>
                                            <select class="form-control" id="CategorySelect1" name="category" required="yes">
                                                {{ $post->category }}
                                                <option>Select Category</option>
                                                @foreach ($cats as $cat)
                                                <option value="{{ $cat->category }}" {{ $post->category == $cat->category ? 'selected' : " " }}> {{ $cat->category }} </option> 
                                                @endforeach
                                            </select>
                                            <small id="CategorySelect1" class="form-text text-muted"> You are required to select a category.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="description1">Brief description</label>
                                            <input type="text" class="form-control form-control-lg" id="description1" name="description" value="{{ $post->description }}" placeholder="enter description" required="yes" />
                                            <small id="description1" class="form-text text-muted"> Enter a brief description.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="article-ckeditor">Enter textarea</label>
                                            <textarea class="form-control" name="article-ckeditor" id="article-ckeditor"> 
                                                {{$post->content}}
                                            </textarea>
                                            <small id="article-ckeditor" class="form-text text-muted"> Enter the total post content.</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top: 80px">
            <img src="https://via.placeholder.com/300x250.png?text=No+Image" width="300" height="250"/>
            </div>
        </div>

        <p style="height: 10px;"> </p>
    </div>
@endsection

@section('create')
    @include('inc.create')
@endsection
