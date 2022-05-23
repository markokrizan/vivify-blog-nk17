<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // index - get all
    // show - get by id
    // store - insert into DB
    // update - update in database
    // destroy - delete from database

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        // select * from posts where id = $id limit 1;
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
}
