@extends('layouts.app')

@section('content')

<form method="POST" action="/urls">
    @csrf
    <div>
        <label for="destination_url">Enter destination URL: </label>
        <input type="text" name="destination_url">
        @error('destination_url')
            <p>{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="track_visits">Track visits: </label>
        <input type="checkbox" name="track_visits" checked>
    </div>
    <div>
        <label for="track_ip_address">Track IP Address: </label>
        <input type="checkbox" name="track_ip_address" checked>
    </div>
    <div>
        <label for="track_operating_system">Track Operating System: </label>
        <input type="checkbox" name="track_operating_system" checked>
    </div>
    <div>
        <label for="track_operating_system_version">Track OS version: </label>
        <input type="checkbox" name="track_operating_system_version" checked>
    </div>
    <div>
        <label for="track_browser">Track Browser: </label>
        <input type="checkbox" name="track_browser" checked>
    </div>
    <div>
        <label for="track_browser_version">Track Browser version: </label>
        <input type="checkbox" name="track_browser_version" checked>
    </div>
    <div>
        <label for="track_referer_url">Track Referer URL: </label>
        <input type="checkbox" name="track_referer_url" checked>
    </div>
    <div>
        <label for="track_device_type">Track Device Type: </label>
        <input type="checkbox" name="track_device_type" checked>
    </div>
    <input type="submit" value="Shorten">
</form>

@endsection