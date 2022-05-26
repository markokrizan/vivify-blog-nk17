@extends('layouts.app')

@section('title', 'Register')

@section('content')
<form action="/register" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter name">
        @include('partials.error-message', [ 'field' => 'name'])
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Enter email">
        @include('partials.error-message', [ 'field' => 'email'])
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" value="{{old('password')}}" class="form-control" id="password" placeholder="Enter password">
        @include('partials.error-message', [ 'field' => 'password'])
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm your password</label>
        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" id="password_confirmation" placeholder="Enter password">
        @include('partials.error-message', [ 'field' => 'password_confirmation'])
    </div>


    <div class="form-check">
        <input type="checkbox" name="terms_of_service" class="form-check-input" id="terms_of_service" value="1">
        <label class="form-check-label" for="terms_of_service">I agree to terms and conditions!</label>
        @include('partials.error-message', [ 'field' => 'terms_of_service'])
    </div>
    <button type="submit" class="btn btn-primary">Register</button>

</form>
@endsection