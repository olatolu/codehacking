<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', function (){

        return view('admin.index');

    });

    Route::resource('/admin/users', 'AdminUsersController', ['names' => [

        'index' => 'admin.users.index',
        'show' => 'admin.users.show',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',


    ]]);

    Route::resource('/admin/posts', 'AdminPostsController',['names' => [

        'index' => 'admin.posts.index',
        'show' => 'admin.posts.show',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
        'update' => 'admin.posts.update',
        'destroy' => 'admin.posts.destroy',


    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names' => [

        'index' => 'admin.categories.index',
        'show' => 'admin.categories.show',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',


    ]]);

    Route::resource('/admin/media', 'AdminMediasController', ['names' => [

        'index' => 'admin.media.index',
        'show' => 'admin.media.show',
        'create' => 'admin.media.create',
        'store' => 'admin.media.store',
        'edit' => 'admin.media.edit',
        'update' => 'admin.media.update',
        'destroy' => 'admin.media.destroy',


    ]]);

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');

    //Route::get('admin/media/upload', ['as'=>'admin.media.upload', 'use'=>'AdminMediasController@upload']);

    Route::resource('/admin/comments', 'PostCommentsController', ['names' => [

        'index' => 'admin.comments.index',
        'show' => 'admin.comments.show',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit',
        'update' => 'admin.comments.update',
        'destroy' => 'admin.comments.destroy',


    ]]);

    Route::resource('/admin/comment/reply', 'CommentRepliesController', ['names' => [

        'index'   => 'admin.comment.reply.index',
        'show'    => 'admin.comment.reply.show',
        'create'  => 'admin.comment.reply.create',
        'store'   => 'admin.comment.reply.store',
        'edit'    => 'admin.comment.reply.edit',
        'update'  => 'admin.comment.reply.update',
        'destroy' => 'admin.comment.reply.destroy',


    ]]);

});

Route::group(['middleware' => 'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});