<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // index - get all
    // show - get by id
    // store - insert into DB
    // update - update in database
    // destroy - delete from database

    public function index()
    {
        // DB::listen(function ($query) {
        //     info($query->sql);
        // });
        $posts = Post::with('author', 'tags')
            ->published()
            ->orderBy('title')
            ->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // info("SHOW METODA"); // stogare/logs/laravel.log
        $post->load('author', 'comments.user');
        // select * from posts where id = $id limit 1;
        // $post = Post::findOrFail($id);
        // $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function store(CreatePostRequest $request)
    {
        // procitamo i validiramo podatke iz requesta
        // upisemo post u bazu
        // redirektujemo korisnika na single post stranicu

        // insert into posts (title, content) values ($title, $content)
        // $request->get('published', false);
        // $request->all();
        // $request->only(['title', 'content', 'is_published']);

        $data = $request->validated();
        $data['is_published'] = $request->get('is_published', false);

        $author = Auth::user();
        $post = $author->posts()->create($data);
        $post->tags()->attach($data['tags']);

        $request->session()->flash(
            'toast_message',
            "You have successfully created a blog post"
        );

        return redirect('/posts/' . $post->id);
    }
}
