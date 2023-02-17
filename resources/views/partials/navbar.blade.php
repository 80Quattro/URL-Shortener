<a href="/">Home</a>

@auth
    @include('partials.user-nav')
@else
    @include('partials.guest-nav')
@endauth