@extends('layouts.app')

@section('content')

<form method="POST" action="/urls/{{$url['id']}}">
    @csrf
    @method("PUT")
    <div class="mb-3">
        <label for="destination_url" class="form-label">Enter destination URL</label>
        <input type="text" name="destination_url" value="{{$url['destination_url']}}" class="form-control"/>
        @error('destination_url')
            <div class="alert alert-danger mt-2">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <input type="checkbox" name="track_visits" 
            {{$url['track_visits'] ? 'checked' : 'unchecked'}} class="form-check-input"/>
        <label for="track_visits" class="form-check-label">Track visits</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="track_ip_address" 
            {{$url['track_ip_address'] ? 'checked' : 'unchecked'}} class="form-check-input" />
        <label for="track_ip_address" class="form-check-label">Track IP Address</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="track_operating_system" 
            {{$url['track_operating_system'] ? 'checked' : 'unchecked'}} class="form-check-input" />
        <label for="track_operating_system" class="form-check-label">Track Operating System</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="track_operating_system_version" 
            {{$url['track_operating_system_version'] ? 'checked' : 'unchecked'}} class="form-check-input" />
        <label for="track_operating_system_version" class="form-check-label">Track OS version</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="track_browser" 
            {{$url['track_browser'] ? 'checked' : 'unchecked'}} class="form-check-input" />
        <label for="track_browser" class="form-check-label">Track Browser</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="track_browser_version" 
            {{$url['track_browser_version'] ? 'checked' : 'unchecked'}} class="form-check-input" />
        <label for="track_browser_version" class="form-check-label">Track Browser version</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="track_referer_url" 
            {{$url['track_referer_url'] ? 'checked' : 'unchecked'}} class="form-check-input" />
        <label for="track_referer_url" class="form-check-label">Track Referer URL</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="track_device_type" 
            {{$url['track_device_type'] ? 'checked' : 'unchecked'}} class="form-check-input" />
        <label for="track_device_type" class="form-check-label">Track Device Type</label>
    </div>
    <input type="submit" value="Edit" class="btn btn-dark">
</form>

@endsection