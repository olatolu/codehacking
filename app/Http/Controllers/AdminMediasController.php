<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    //
    public function index(){

        $photos = Photo::all();

        return view('admin.upload.index', compact('photos'));


    }

    public  function create(){


        return view('admin.upload.create');


    }

    public  function store(Request $request){

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file' => $name]);


    }


    public  function destroy($id){


        $photo = Photo::findOrfail($id);

            if (file_exists(public_path() . $photo->file)) {

                unlink(public_path() . $photo->file);

            }

        $photo->delete();

        Session::flash('admin_photo_delete_msg', "The media ({$id}) has been deleted !!!");

        return redirect(route('admin.media.index'));


    }
}
