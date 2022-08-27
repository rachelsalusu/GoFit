<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="">Mobil Bekas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class='navbar-nav ml-auto'>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
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
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav col">
                <table class="table table-bordered" >
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <li class="nav-item col-12 " style="height: 30px;">
                                    <a class="nav-link {{(request()->is('/')) ? 'active' : ''}}" aria-current="page"
                                        href="/"><strong>Home</strong></a>
                                </li>
                            </td>
                            <td class="text-center">            
                                <li class="nav-item col-12 " style="height: 30px;">
                                    <a class="nav-link {{(request()->segment(1) == 'product') ? 'active' : ''}}"
                                        href="/product"><strong>Products</strong></a>
                                </li>
                            </td>
                            <td class="text-center">            
                                <li class="nav-item col-12 " style="height: 30px;">
                                    <a class="nav-link {{(request()->segment(1) == 'merchant') ? 'active' : ''}}"
                                        href="{{ route('merchant.index') }}"><strong>My Merchant</strong></a>
                                </li>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </ul>
        </div>
    </div>
</nav>