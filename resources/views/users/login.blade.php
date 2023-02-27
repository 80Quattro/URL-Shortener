@extends('layouts.app')

@section('content')

<form method="POST" action="/users/authenticate">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email: </label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
        @error('email')
            <div class="alert alert-danger mt-2">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password: </label>
        <input type="password" name="password" value="{{ old('password') }}" class="form-control">
        @error('password')
            <div class="alert alert-danger mt-2">{{$message}}</div>
        @enderror
    </div>
    <input type="submit" value="Login" class="btn btn-dark">
</form>

@endsection