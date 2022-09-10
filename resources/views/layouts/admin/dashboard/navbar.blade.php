<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container d-flex">
        <a class="navbar-brand mt-4" href="/product">
            <img src="{{ asset("image/logo-putih.png") }}" style="width: 100px;" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class='navbar-nav ml-auto'>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="navlogin font-navlogin">
                            Welcome, <strong>{{ auth()->user()->username }}</strong>
                        </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type='submit' class='dropdown-item'><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                            </form>
                            
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i
                            class="bi bi-box-arrow-in-right"></i>Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>