@extends('layouts.admin')

@section('content')

    <h2>Replies for Post <a href="{{route('home.post', $post->id)}}" target="_blank">{{$post->title}}</a></h2>

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

    @if(count($replies) > 0)

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Post</th>
                <th>Created at</th>
                <th>Update at</th>
            </tr>
            </thead>
            <tbody>

            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}" target="_blank">{{$reply->comment->post->title}}</a></td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>{{$reply->updated_at}}</td>
                    <td>

                        @if($reply->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">

                                {!! Form::button('<i class="fa fa-thumbs-down"></i>', ['type' => 'submit', 'class'=>'btn btn-warning']) !!}

                            </div>

                            {!! Form::close() !!}


                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">

                                {!! Form::button('<i class="fa fa-thumbs-up"></i>', ['type' => 'submit', 'class'=>'btn btn-info']) !!}

                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}

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