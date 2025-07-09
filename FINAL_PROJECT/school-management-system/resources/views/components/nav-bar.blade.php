<style>
    .bg-primary {
        border-left: 3px solid yellow !important;
        border-right: 3px solid yellow !important;
        border-bottom: 3px solid yellow !important;
        border-bottom-left-radius: 3px !important;
        border-bottom-right-radius: 3px !important;
        box-shadow: 0px 4px 10px rgba(0, 64, 133, 0.5);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
    }

    .navbar {
        height: 47px;
    }

    .nav-item {
        margin-right: 1px;
    }

    .badge {
        font-size: .65em;
        margin-top: 7px;
    }

    .start-100 {
        left: 90% !important;
    }
</style>
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active d-flex align-items-center gap-1" aria-current="page" href="/"><i
                            class="fas fas fa-home"></i>Home</a>
                </li>

                @auth
                    @if (Auth::user()->role === 'ADMIN')
                        {{-- Adjust role check as per your DB --}}
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-1" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                    @endif
                @endauth

            </ul>

        </div>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="btn btn-primary d-flex align-items-center gap-1" href="{{ route('user.profile') }}"><i
                                class="fas fa-user-circle"></i>Profile</a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="btn btn-primary d-flex align-items-center gap-1" href=" {{ route('login') }}"><i
                                class="fas fa-sign-in-alt"></i>Login</a>
                    </li>
                @endguest

                {{-- @auth
                <li class="nav-item">
                        <a class="btn btn-primary d-flex align-items-center gap-1" href="{{ route('logout') }}"><i
                                class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
                @endauth --}}
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-1">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
