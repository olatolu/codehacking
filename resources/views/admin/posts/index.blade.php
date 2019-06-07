@extends('layouts.admin')


@section('content')

    <h1>All Posts</h1>

    @if(Session::has('admin_post_update_msg'))

        <div class="alert alert-success" role="alert">
            {{session('admin_post_update_msg')}}
        </div>


    @endif

    @if(Session::has('admin_post_delete_msg'))

        <div class="alert alert-danger" role="alert">
            {{session('admin_post_delete_msg')}}
        </div>


    @endif


    @if($posts)

          <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Photo</th>
                  <th>Title</th>
                  <th>User</th>
                  <th>Category</th>
                  <th>Comments</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td><img width="60" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/30x30'}}" alt=""></td>
                  <td><a href="{{route('home.post', $post->slug)}}" target="_blank">{{$post->title}}</a></td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                  <td>
                      @if(count($post->comments) > 0)
                          <a href="{{route('admin.comments.show', $post->id)}}">View Comments</a>

                      @else

                          No Comment

                      @endif

                  </td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
                  <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-info btn-sm" style="display:inline; margin-right: 5px;">
                            <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id], 'style'=>'display:inline-block;']) !!}

                        <div class="form-group">

                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}

                        </div>

                        {!! Form::close() !!}

                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>

          <div class="row">
              <div class="col-sm-6 col-sm-offset-5">

                  {{$posts->render()}}
              </div>
          </div>


    @endif

@endsection