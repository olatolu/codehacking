@extends('layouts.admin')


@section('content')

    <h1>All Media</h1>

    @if(Session::has('admin_photo_delete_msg'))

        <div class="alert alert-danger" role="alert">
            {{session('admin_photo_delete_msg')}}
        </div>


    @endif

    @if($photos)

        <form action="delete/media" method="post" class="form-inline">

            {{csrf_field()}}

            {{method_field('delete')}}

        <div class="form-group">

            <select name="checkBoxArrayBtn" id="" class="form-control">
                <option value="">--Select Option --</option>
                <option value="delete">Delete</option>

            </select>

        </div>

        <div class="form-group">
            <input type="submit" value="submit" name="bulk_delete" class="btn btn-primary">
        </div>

        <table class="table">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>Id</th>
                <th>Photo</th>
                <th>Created at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file ? $photo->file : '#'}}" alt=""></td>
                    <td>{{$photo->created_at}}</td>
                    <td>

                        <input type="hidden" name="single_delete_id" value="{{$photo->id}}">
                        <div class="form-group d-inline">

                            <button type="submit" name="single_delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        </form>

        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">

                {{$photos->render()}}
            </div>
        </div>

    @endif

@stop


@section('scripts')

    <script>

        $(document).ready(function () {

            $('#options').click( function () {

                if(this.checked){

                    $('.checkBoxes').each( function () {

                        this.checked = true;

                    });

                }else {

                    $('.checkBoxes').each( function () {

                        this.checked = false;

                    });

                }

            });


            //console.log('I am here')

        });


    </script>

@endsection