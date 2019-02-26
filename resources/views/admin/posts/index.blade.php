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
                  <th>User</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Created</th>
                  <th>Updated</th>
                </tr>
              </thead>
              <tbody>

              @foreach($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td><img width="60" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/30x30'}}" alt=""></td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>




    @endif

@endsection