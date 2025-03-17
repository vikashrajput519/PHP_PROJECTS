<style>
    .bg-primary {
        border-left: 3px solid yellow !important;
        border-right: 3px solid yellow !important;
        border-bottom: 3px solid yellow !important;
        border-bottom-left-radius: 3px !important;
        border-bottom-right-radius: 3px !important;
        box-shadow: 0px 4px 10px rgba(0, 64, 133, 0.5);
    }

    .navbar {
        height: 47px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ 'assets/logo/V-Cart.png' }}" alt="V-Cart" width="30" height="24"
                class="d-inline-block align-text-top">
            V-Cart
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
            </ul>

        </div>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
