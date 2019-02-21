<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $fillable = ['file'];

    protected $uploads = '/images/';


    public function getFileAttribute($request){

        return $this->uploads . $request;

    }
}
