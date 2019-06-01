@extends('layouts.admin')


@section('content')



@section('content')

    <div class="row">

        <h1>All Categories</h1>

        @if(Session::has('admin_cat_update_msg'))

            <div class="alert alert-success" role="alert">
                {{session('admin_cat_update_msg')}}
            </div>


        @endif

        @if(Session::has('admin_cat_delete_msg'))

            <div class="alert alert-danger" role="alert">
                {{session('admin_cat_delete_msg')}}
            </div>


        @endif

        <div class="col-sm-4">
            <h2>Create Categories</h2>

            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

            <div class="form-group">

                {!! Form::label('name', 'Category Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Enter the category\'s title']) !!}

            </div>

            <div class="form-group">

                {!! Form::submit('Create Categories', ['class'=>'btn btn-primary']) !!}

            </div>

            {!! Form::close() !!}

            @include('includes.form_errors')
        </div>

        <div class="col-sm-8">
            @if($categories)

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)

                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at}}</td>
                            <td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-info btn-sm"
                                   style="display:inline; margin-right: 5px;">
                                    <span class="glyphicon glyphicon-pencil"></span> Edit
                                </a>

                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id], 'style'=>'display:inline-block;']) !!}

                                <div class="form-group" style="display: inline;">

                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}

                                </div>

                                {!! Form::close() !!}

                            </td>
                        </tr>

                    @endforeach
                    </tbody>


                </table>


            @endif
        </div>

    </div>

@endsection
