@extends('layouts.app')

@section('content')
    <h1 class="my-5">Welcome to our URL Shortener!</h1>

    <p class="lead">With our service, you can easily shorten long, unwieldy URLs into short, easy-to-remember links. Whether you need to share a link on social media, in an email, or on a business card, our URL Shortener makes it simple and convenient.</p>

    <p>To get started, simply enter a long URL into the form on our homepage and click "Shorten". We'll generate a short, unique code for your URL that you can use to access it from anywhere. And if you ever need to edit or delete your shortened links, you can do so easily from your user dashboard.</p>

    <p>We also provide visits counter and visitor tracking features such as: web browser, device type, operating system, etc.</p>

    <p><a href="/login" class="btn btn-dark">Login</a> or <a href="/register"class="btn btn-dark">Register</a> to start</p>
@endsection