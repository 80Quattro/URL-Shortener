@extends('layouts.app')

@section('content')

<form method="POST" action="/urls/{{$url['id']}}">
    @csrf
    @method("PUT")
    <input type="text" name="destination_url" value="{{$url['destination_url']}}"/>
    <input type="submit" value="Edit">
</form>

@endsection