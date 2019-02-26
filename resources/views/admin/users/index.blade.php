@extends('layouts.admin')


@section('content')

    @if(Session::has('admin_user_update_msg'))

        <div class="alert alert-success" role="alert">
           {{session('admin_user_update_msg')}}
        </div>


    @endif

    @if(Session::has('admin_user_delete_msg'))

        <div class="alert alert-danger" role="alert">
            {{session('admin_user_delete_msg')}}
        </div>


    @endif

    <h1>Users</h1>

      <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          @if($users)

            @foreach($users as $user)

            <tr>
              <td>{{$user->id}}</td>
              <td><img height="30" width="30" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/30x30'}}"></td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->role->name}}</td>
              <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at}}</td>
              <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-info btn-sm" style="display:inline; margin-right: 5px;">
                      <span class="glyphicon glyphicon-pencil"></span> Edit
                  </a>

                  {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id], 'style'=>'display:inline-block;']) !!}

                  <div class="form-group">

                      {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}

                  </div>

                  {!! Form::close() !!}

              </td>
            </tr>

            @endforeach


          @endif
          </tbody>
      </table>



@endsection