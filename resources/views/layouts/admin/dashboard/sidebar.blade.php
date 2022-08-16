<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{(request()->segment(2) == '') ? 'active' : ''}}" aria-current="page"
                    href="{{route('dashboard.index')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(request()->segment(2) == '') ? 'active' : ''}}" aria-current="page"
                    href="{{route('admin.dashboard.admintokens.index')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Admin Token
                </a>
            </li>
        </ul>
    </div>
</nav>