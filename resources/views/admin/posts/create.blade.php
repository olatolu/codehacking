@extends('layouts.admin')

@section('content')

    @include('includes.tinyeditor')

    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files' => true]) !!}

    <div class="form-group">

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Enter the post\'s title']) !!}

    </div>

    <div class="form-group">

        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', array(''=>'Select Option') + $categories, null, ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::label('Description', 'Description:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control my-editor','placeholder'=>'Enter the post\'s body']) !!}

    </div>

    <div class="form-group">

        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}

    @include('includes.form_errors')



@endsection