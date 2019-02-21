@extends('layouts.admin')


@section('content')
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
              <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-info btn-sm">
                      <span class="glyphicon glyphicon-pencil"></span> Edit
                  </a></td>
            </tr>

            @endforeach


          @endif
          </tbody>
      </table>



@endsection