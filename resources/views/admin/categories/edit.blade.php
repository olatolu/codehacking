@extends('layouts.admin')



@section('content')

    <div class="row">

        <h1>Edit Category <em>{{$category->name}}</em></h1>

        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id]]) !!}

        <div class="form-group">

            {!! Form::label('Name', 'Category Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}

        </div>

        <div class="form-group col-sm-6">

            {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id] ]) !!}

        <div class="form-group col-sm-6">

            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}

        </div>

        {!! Form::close() !!}

    </div>
    @include('includes.form_errors')

@endsection