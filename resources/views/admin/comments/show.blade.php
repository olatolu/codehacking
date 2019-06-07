@extends('layouts.admin')

@section('content')

    <h2>Comments for Post <a href="{{route('home.post', $post->id)}}" target="_blank">{{$post->title}}</a></h2>

    @if(Session::has('admin_comment_update_msg'))

        <div class="alert alert-success" role="alert">
            {{session('admin_comment_update_msg')}}
        </div>


    @endif

    @if(Session::has('admin_comment_delete_msg'))

        <div class="alert alert-danger" role="alert">
            {{session('admin_comment_delete_msg')}}
        </div>


    @endif

    @if(count($comments) > 0)

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Post</th>
                <th>Comments</th>
                <th>Created at</th>
                <th>Update at</th>
            </tr>
            </thead>
            <tbody>

            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post', $comment->post_id)}}" target="_blank">{{$comment->post->title}}</a></td>
                    <td>
                        @if(count($comment->replies) > 0)
                            <a href="{{route('admin.comment.reply.show', $comment->id)}}">View Replies</a>

                        @else

                            No Replies

                        @endif

                    </td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at}}</td>
                    <td>

                        @if($comment->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">

                                {!! Form::button('<i class="fa fa-thumbs-down"></i>', ['type' => 'submit', 'class'=>'btn btn-warning']) !!}

                            </div>

                            {!! Form::close() !!}


                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">

                                {!! Form::button('<i class="fa fa-thumbs-up"></i>', ['type' => 'submit', 'class'=>'btn btn-info']) !!}

                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                        <div class="form-group">

                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}

                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @endif

@stop