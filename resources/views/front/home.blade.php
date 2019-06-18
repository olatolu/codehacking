@extends('layouts.blog-home')

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">
            {{$config['pageHeader1'] ? $config['pageHeader1'] : '' }}
            <small>{{$config['pageHeader2'] ? $config['pageHeader2'] : '' }}</small>
        </h1>

    <!-- Blog Posts -->

     @if(count($posts)>0)

         @foreach($posts as $post)

            <h2>
                <a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="#">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
            <hr>
            <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="{{$post->title}}">
            <hr>
             {{str_limit($post->title, 100)}}
            <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
         @endforeach

         <!-- Pager -->
             <ul class="pager">
                 <li class="previous">
                     <a href="{{$posts->previousPageUrl()}}">&larr; Previous</a>
                 </li>
                 <li class="next">
                     <a href="{{$posts->nextPageUrl()}}">Next &rarr;</a>
                 </li>
             </ul>

     @else

        <p>No Posts to Show here</p>

    @endif

    </div>

    <!-- Blog Sidebar Widgets Column -->
    @include('includes.front.front_side_bar')

@endsection
