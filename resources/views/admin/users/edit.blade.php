@extends('layouts.admin')

@section('content')

  <div class="row">

    <h1>Edit User</h1>
    
    <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        
    </div>
    
    <div class="col-sm-9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id ], 'files' => true]) !!}
    
        <div class="form-group">
    
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Enter the user\'s ful name']) !!}
    
        </div>
    
    
        <div class="form-group">
    
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Enter the user\'s email']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', array(''=>'Choose Option') + $roles , null, ['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
            <td><img height="60" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/60x60'}}"></td>
    
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    
        </div>
    
    
        <div class="form-group">
    
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Enter the user\'s password']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
    
        </div>
    
        {!! Form::close() !!}
    
        @include('includes.form_errors')

    </div>
  </div>



@endsection