@extends("layouts.app")

@section('title', $user->name."'s posts")

@section('content')
<h1>Posts from {{$user->name}}</h1>

<ul>
    @foreach($user->posts as $post)
    <li>
        <a href="{{route('single_post', ['post' => $post->id])}}">
            {{$post->title}} - {{$user->name}}
        </a>
    </li>
    @endforeach
</ul>
@endsection