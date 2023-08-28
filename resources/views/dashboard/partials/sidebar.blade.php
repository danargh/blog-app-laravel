<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Danar's Blog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <h6 class=" d-flex mx-3 text-secondary">
                USER
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('dashboard') ? 'bg-body-secondary' : ''}} text-dark d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
                        <i class="text-dark" data-feather="bar-chart-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark d-flex align-items-center gap-2" href="#">
                        <i class="text-dark" data-feather="activity"></i>
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('dashboard/posts*') ? 'bg-body-secondary' : ''}} text-dark d-flex align-items-center gap-2" href="/dashboard/posts">
                        <i class="text-dark" data-feather="file-text"></i>
                        My Posts
                    </a>
                </li>
            </ul>

            @can('admin')
            <hr class="my-3">

            <h6 class=" d-flex mx-3 text-secondary">
                ADMIN
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-dark d-flex align-items-center gap-2" href="#">
                        <i class="text-dark" data-feather="users"></i>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('dashboard/allPosts*') ? 'bg-body-secondary' : ''}} text-dark d-flex align-items-center gap-2" href="/dashboard/posts">
                        <i class="text-dark" data-feather="file-text"></i>
                        Posts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('dashboard/categories*') ? 'bg-body-secondary' : ''}} text-dark d-flex align-items-center gap-2" href="/dashboard/categories">
                        <i class="text-dark" data-feather="tag"></i>
                        Categories
                    </a>
                </li>
            </ul>
            @endcan

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-dark gap-2" href="#">
                        <i class="text-dark" data-feather="settings"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-dark gap-2" href="/">
                        <i class="text-dark" data-feather="home"></i>
                        Homepage
                    </a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST" class="d-flex">
                        @csrf
                        <button type="submit" class="text-dark nav-link d-flex align-items-center"><i class="text-dark" style="margin-right: 0.5rem" data-feather="log-out"></i>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>