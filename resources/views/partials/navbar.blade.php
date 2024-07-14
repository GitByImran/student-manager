<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-light py-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="50" height="50" class="d-inline-block align-top">
        <span class="text-secondary">Student Manager</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link nav-menu-link" href="/">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-menu-link" href="/students">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-menu-link" href="/subjects">Subjects</a>
            </li>

            <!-- Authentication Link -->
            <li class="nav-item d-flex align-items-center gap-2 text-success mx-4">
                @auth
                <i class="fa fa-user mr-2"></i> <span>{{Auth::user()->email}}</span>
                @endauth
            </li>
            <li class="nav-item btn btn-primary px-4" id="authButton">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>