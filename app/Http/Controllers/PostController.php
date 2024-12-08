<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        //userတင်ထားတဲ့dataကိုပြ

        $post = Post::latest()->get();
        return view('post.index', compact('posts'));

    }

    public function create()
    {

       // USERတင်ချင်တာကိုCREATE

        return view('post.create');

    }

    public function store(Request $request)
    {
                //DATABASE保存


    }
}
