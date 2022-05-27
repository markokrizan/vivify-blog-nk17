@extends('layouts.app')

@section('title', 'Create a post')

@section('content')
<h1>Create a post</h1>

<form method="POST" action="/posts/create">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" aria-describedby="titlelHelp" placeholder="Enter title">
        @include('partials.error-message', [ 'field' => 'title'])
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" id="content" rows="5"></textarea>
        @include('partials.error-message', [ 'field' => 'content'])
    </div>

    <div class="form-check">
        <input type="checkbox" name="published" class="form-check-input" id="published" value="1">
        <label class="form-check-label" for="published">Publish now?</label>
    </div>
    <div>
        <span>Select tags:</span>
        @foreach($tags as $tag)
            <div>
             <input type="checkbox" class="form-check-input" id="tag-{{$tag->id}}" name="tags[]" value="{{$tag->id}}" />
             <label for="tag-{{$tag->id}}" class="form-check-label">{{$tag->name}}</label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection