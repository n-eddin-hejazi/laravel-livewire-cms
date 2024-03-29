 <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item" style="list-style: none">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item dropdown" style="list-style: none">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown" style="list-style: none">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <ul class="navbar-nav mx-auto align-items-center">
            <div class="topbar" style="z-index:1">
                @auth
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow alert-dropdown mx-1" style="list-style: none">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw fa-lg"></i>
                            <!-- Counter - Alerts -->
                             <span class="badge badge-danger badge-counter notif-count" data-count="{{ App\Models\Alert::where('user_id', Auth::user()->id)->first()->alert }}">{{ App\Models\Alert::where('user_id', Auth::user()->id)->first()->alert }}</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right text-right mt-2 mr-auto"
                            aria-labelledby="alertsDropdown">
                            <div class="alert-body">

                            </div>
                            {{-- {{ route('all.Notification') }} --}}
                            <a class="dropdown-item text-center small text-gray-500" href="{{ route('all.Notification') }}">Show all notifications</a>
                        </div>
                    </li>
                @endauth
            </div>

            @auth
                <li class="nav-item" style="list-style: none">
                    <a class="nav-link" href="{{ route('posts.create') }}"><i class="fa fa-plus fa-fw"></i>Add new post</a>
                </li>
            @endauth

            <!-- Search Box -->
            <li style="list-style: none">
                <form class="d-flex" method="post" action="{{ route('search') }}">
                    @csrf
                    <input class="form-control form-control-sm mx-2 rounded" name="keyword" type="search" placeholder="Search a post" aria-label="Search">
                    <button class="btn btn-sm btn-outline-light" type="submit">Go</button>
                </form>
            </li>
            @guest
                <li class="nav-item" style="list-style: none">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                <li class="nav-item" style="list-style: none">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @else
                <li class="nav-item" style="list-style: none">
                    <a class="nav-link" href="{{ route('profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
