<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->simplePaginate(5);

        $categories = Category::all();

        $config = [
            'pageTitle' => 'HOME',
            'bodyClass' => 'home-page',
            'pageHeader1' => 'HOME',
            'pageHeader2' => null
        ];

        return view('front.home', compact('config','posts', 'categories'));

    }

    public function post($slug){

        //$post = Post::findBySlugOrIdOrFail($idOrSlug);

        $post = Post::findBySlugOrFail($slug);

        $categories = Category::all();

        $config = [
            'pageTitle' => $post->title,
            'bodyClass' => 'post_page_'.$post->id,
        ];

        $comments = $post->comments()->whereIsActive(1)->get();

        return view('front.post', compact('post', 'comments', 'config', 'categories'));
    }
}
