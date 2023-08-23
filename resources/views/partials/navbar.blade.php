<nav class="navbar navbar-expand-lg" style="background-color: rgb(43, 142, 255);">
    <div class="container" style="font-weight: 500">
        <a class="navbar-brand" href="#">Danar's Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'blog' ? 'active' : '' }}" href="/posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Categories</a>
                </li>
            </ul>

            @auth
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}<i style="font-size: 24px; margin-left: 8px" class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="/dashboard"><i style="font-size: 24px; margin-right: 8px" class="bi bi-window-sidebar"></i>My Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class=" dropdown-item d-flex align-items-center"><i style="font-size: 24px; margin-right: 8px" class="bi bi-box-arrow-left"></i>Logout</button>
                        </form>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex justify-items-center">
                    <a href="/login" class="nav-link d-flex align-items-center {{ $active === 'login' ? 'active' : '' }}"><i style="font-size: 24px; margin-right:8px;" class="bi bi-box-arrow-in-right"></i>Login</a>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>