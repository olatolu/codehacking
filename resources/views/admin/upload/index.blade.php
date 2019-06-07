@extends('layouts.admin')


@section('content')

    <h1>All Media</h1>

    @if(Session::has('admin_photo_delete_msg'))

        <div class="alert alert-danger" role="alert">
            {{session('admin_photo_delete_msg')}}
        </div>


    @endif

    @if($photos)

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Created at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file ? $photo->file : '#'}}" alt=""></td>
                    <td>{{$photo->created_at}}</td>
                    <td>{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id], 'style'=>'display:inline-block;']) !!}

                        <div class="form-group d-inline">

                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}

                        </div>

                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

@stop