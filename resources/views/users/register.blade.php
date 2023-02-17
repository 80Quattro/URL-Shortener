@extends('layouts.app')

@section('content')

<form method="POST" action="/users">
    @csrf
    <div>
        <label for="email">Email: </label>
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
            <p>{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" value="{{ old('password') }}">
        @error('password')
            <p>{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="password_confirmation">Repeat password: </label>
        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
        @error('password_confirmation')
            <p>{{$message}}</p>
        @enderror
    </div>
    <input type="submit" value="Register">
</form>

@endsection