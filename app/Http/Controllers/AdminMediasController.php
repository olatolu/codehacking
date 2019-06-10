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

        $photos = Photo::paginate(10);

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

        //return redirect(route('admin.media.index'));


    }

    public function deleteMedia(Request $requests)
    {

        if ((isset($requests->bulk_delete)) && ($requests->checkBoxArrayBtn == 'delete') && (!empty($requests->checkBoxArray[0]))  ){

        $photos = Photo::findOrfail($requests->checkBoxArray);

        foreach ($photos as $photo) {

        if (file_exists(public_path() . $photo->file)) {

            unlink(public_path() . $photo->file);

        }

        $id_arrays[] = $photo->id;

        $photo->delete();

        }

        $flash_msg = "The selected media with  IDs ";

        foreach ($id_arrays as $id_array){

            $flash_msg .= " ($id_array) ";
        }

        $flash_msg .= "has been deleted !!!";

        Session::flash('admin_photo_delete_msg', $flash_msg);

            return redirect()->back();

        }elseif(isset($requests->single_delete)){

            $this->destroy($requests->single_delete_id);

            return redirect()->back();

        }else{

            return redirect()->back();
        }

    }
}
