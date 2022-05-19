@extends("layouts.app")

@section('title', $post->title)

@section('content')
<h1>{{$post->title}}</h1>
<div>Published at: {{$post->created_at}}</div>
<p>{{$post->content}}</p>
@endsection