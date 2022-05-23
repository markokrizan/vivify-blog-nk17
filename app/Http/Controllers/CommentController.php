<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, CreateCommentRequest $request)
    {
        $data = $request->validated(); // [ 'content' => $request->get('content')]

        $comment = $post->comments()->create($data); // insert into comments (content) values ('asdfasdf')
        return back();
    }
}
