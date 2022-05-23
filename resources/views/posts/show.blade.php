@extends("layouts.app")

@section('title', $post->title)

@section('content')
<h1>{{$post->title}}</h1>
<small class="text-muted">Published at: {{$post->created_at}}</small>
<p>{{$post->content}}</p>
<hr />
<div>
    <h5>Comments:</h5>
    @foreach($post->comments as $comment)
    <div>{{$comment->content}}</div>
    @endforeach

    <form method="POST" action="/posts/{{$post->id}}/comments">
        @csrf

        <div class="form-group">
            <label for="content">Leave your comment</label>
            <textarea name="content" class="form-control" id="content" rows="2"></textarea>
            @include('partials.error-message', [ 'field' => 'content'])
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection