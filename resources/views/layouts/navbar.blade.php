<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container d-flex">
        <a class="navbarposition" href="/product">
            <img src="{{ asset("image/logoo.png") }}" style="width: 150px;" alt="">
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
                            @if ( auth()->user()->isadmin == 1 )
                                <a href="{{ route('admin.dashboard.transactions.index') }}" style="text-decoration: none">
                                    <button type='submit' class='dropdown-item'>Admin</button>
                                </a>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type='submit' class='dropdown-item'><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            @else
                            <form action="/logout" method="post">
                                @csrf
                                <button type='submit' class='dropdown-item'><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                            </form>
                            @endif
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"> 
                    <button class="navlogin font-navlogin"style="padding-top:0px">Login</button></a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-white" style="padding: 0px;height: 50px">
    <div class="">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div id="navbarbtn">
                <a class=""  href="{{ route('account.index') }}">
                    <button class="btnnavbar {{(request()->segment(1) == 'account') ? 'active' : ''}}">Account</button>
                </a>
                <a class=""  href="{{ route('merchant.index') }}">
                    <button class="btnnavbar {{(request()->segment(1) == 'merchant') ? 'active' : ''}}">Trainer</button>
                </a>
                <a class=""  href="{{ route('orders.index') }}">
                    <button class="btnnavbar {{(request()->segment(1) == 'orders') ? 'active' : ''}}">My Course</button>
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("navbarbtn");
    var btns = header.getElementsByClassName("btnnavbar");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
      });
    }
</script>