@extends('layouts.app')

@section('content')
    <form method="POST" action="/urls">
        @csrf
        <div class="mb-3">
            <label for="destination_url" class="form-label">Enter destination URL</label>
            <input type="text" name="destination_url" class="form-control">
            @error('destination_url')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="checkbox" name="track_visits" checked class="form-check-input">
            <label for="track_visits" class="form-check-label">
                Track visits
            </label>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="track_ip_address" checked class="form-check-input">
            <label for="track_ip_address" class="form-check-label">
                Track IP Address
            </label>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="track_operating_system" checked class="form-check-input">
            <label for="track_operating_system" class="form-check-label">
                Track Operating System
            </label>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="track_operating_system_version" checked class="form-check-input">
            <label for="track_operating_system_version" class="form-check-label">
                Track OS version
            </label>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="track_browser" checked class="form-check-input">
            <label for="track_browser" class="form-check-label">
                Track Browser
            </label>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="track_browser_version" checked class="form-check-input">
            <label for="track_browser_version" class="form-check-label">
                Track Browser version
            </label>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="track_referer_url" checked class="form-check-input">
            <label for="track_referer_url" class="form-check-label">
                Track Referer URL
            </label>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="track_device_type" checked class="form-check-input">
            <label for="track_device_type" class="form-check-label">
                Track Device Type
            </label>
        </div>
        <input type="submit" value="Shorten" class="btn btn-dark">
    </form>
@endsection
