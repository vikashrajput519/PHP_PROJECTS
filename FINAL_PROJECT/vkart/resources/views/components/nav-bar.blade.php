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

    /* Ensure content is not hidden behind navbar */
    .content-height {
        margin-top: 60px;
        /* Adjust based on navbar height */
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
                    <a class="nav-link active d-flex align-items-center gap-1" aria-current="page"
                        href="{{ route('home') }}"><i class="fas fas fa-home"></i>Home</a>
                </li>
            </ul>

        </div>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item">
                        <a class="btn btn-primary d-flex align-items-center gap-1" href="#"><i
                                class="fas fa-user-circle"></i>Profile</a>
                    </li>
                @endauth

                <li class="nav-item">
                    <a class="btn btn-primary d-flex align-items-center gap-1" href="#"><i
                            class="fas fa-cart-shopping"></i>Cart</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="btn btn-primary d-flex align-items-center gap-1" href="{{ route('login') }}"><i
                                class="fas fa-sign-in-alt"></i>Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="btn btn-primary d-flex align-items-center gap-1" href="{{ route('logout') }}"><i
                                class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
