@extends("layouts.app")

@section('title', 'Posts')

@section('content')

<form method="GET">
    <select name="tags[]" multiple>
        @foreach($allTags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>

    <button type="submit">Search by tag</button>
</form>

<h1>Posts</h1>

<ul>
    @foreach($posts as $post)
    <li>
        <a href="/posts/{{$post->id}}">
            {{$post->title}}
        </a>
        -
        <a href="{{route('user_posts', ['user' => $post->author->id] )}}">
            {{$post->author->name}}
        </a>
    </li>
    @endforeach
</ul>
@endsection