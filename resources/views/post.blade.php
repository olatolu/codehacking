@extends('layouts.blog-post')


@section('content')

    @if($post)

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead"></p>
    <p>{{$post->title}}</p>
    <hr>

    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        @if(Session::has('comment_update_msg'))

            <div class="alert alert-success" role="alert">
                {{session('comment_update_msg')}}
            </div>
        @endif

        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="form-group">

                {!! Form::label('', '') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control','placeholder'=>'Type your comment here!!!', 'rows'=>3]) !!}

            </div>

            <div class="form-group">

                {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}

            </div>

        {!! Form::close() !!}
    </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if(count($comments) > 0)

        @foreach($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            {{--<img height="64" class="media-object" src="{{$comment->photo ? $comment->photo : 'http://placehold.it/64x64' }}" alt="">--}}
            <img height="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p><em>{{$comment->body}}</em></p>

            @if(count($replies = $comment->replies()->whereIsActive(1)->get()) > 0)

                @foreach($replies as $reply)
            <!-- Nested Comment -->
            <div id="nested-comment" class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{$reply->photo ? $reply->photo : 'http://placehold.it/64x64' }}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$reply->author}}
                        <small>{{$reply->created_at->diffForHumans()}}</small>
                    </h4>
                    <p><em>{{$reply->body}}</em></p>
                </div>
            </div>
            <!-- End Nested Comment -->
                @endforeach

            @endif

            @if(Auth::check())

                <div class="comment-reply-container">

                    <button class="comment-reply btn btn-primary pull-right">Reply</button>

                    <div class="comment-reply-form">

                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                        <input type="hidden" name="comment_id" value="{{$comment->id}}">

                        <div class="form-group">

                            {!! Form::label('', '') !!}
                            {!! Form::textarea('body', null, ['class'=>'form-control','placeholder'=>'Insert your reply', 'rows'=>1]) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::submit('Submit Reply', ['class'=>'btn btn-primary']) !!}

                        </div>

                        {!! Form::close() !!}
                    </div>

                </div>

              @endif


        </div>
    </div>

        @endforeach

    @endif

    <!-- Comment -->

    @endif

@endsection

@section('scripts')

    <script>

        $(".comment-reply-container .comment-reply").click(function(){

            $(this).next().slideToggle("slow");

        });

    </script>

@stop