<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="/urls">Your URLs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/urls/create">Create new</a>
        </li>
    </ul>
    <form method="POST" action="/logout" class="d-flex">
        @csrf
        <button>Logout</button>
    </form>
</div>