@extends('layouts.app')

@section('content')

@if(session()->has('message'))
    <x-message :message="session('message')" />
@endif

    <a href="/urls/create" class="btn btn-dark float-end">Create new</a>

    @unless(count($urls) == 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Short URL</th>
                    <th>Destination URL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($urls as $url)
                    <tr>
                        <td>{{ $url['default_short_url'] }}</td>
                        <td>{{ $url['destination_url'] }}</td>
                        <td>
                            <a href="/urls/{{ $url['id'] }}" class="btn btn-dark">Details</a>
                            <a href="/urls/{{ $url['id'] }}/edit" class="btn btn-dark">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        You have no URLs yet.
    @endunless

@endsection
