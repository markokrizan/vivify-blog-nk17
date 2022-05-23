@extends('layouts.app')

@section('title', 'Create a post')

@section('content')
<h1>Create a post</h1>

<form method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" aria-describedby="titlelHelp" placeholder="Enter title">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" id="content" rows="5"></textarea>
    </div>

    <div class="form-check">
        <input type="checkbox" name="published" class="form-check-input" id="published" value="1">
        <label class="form-check-label" for="published">Publish now?</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection