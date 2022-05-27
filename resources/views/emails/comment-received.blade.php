<html>

<body>
    <h2>Hi, {{$comment->post->author->name}}</h2>
    <p>
        {{$comment->user->name}} has left a comment on your post {{$comment->post->title}}:
    <blockquote>
        {{$comment->content}}
    </blockquote>
    </p>
</body>

</html>