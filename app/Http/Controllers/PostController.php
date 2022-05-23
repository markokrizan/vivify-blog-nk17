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

    public function show(Post $post)
    {
        // select * from posts where id = $id limit 1;
        // $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // procitamo podatke iz requesta
        // validiramo podatke
        // upisemo post u bazu
        // redirektujemo korisnika na single post stranicu
        $title = $request->get('title');
        $content = $request->get('content');
        // $published = $request->get('published', false);

        // insert into posts (title, content) values ($title, $content)
        $post = new Post;
        $post->title = $title;
        $post->content = $content;
        $post->save();

        return $post;
    }
}
