{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{(request()->segment(2) == '') ? 'active' : ''}}" aria-current="page"
                    href="{{route('admin.dashboard.admintokens.index')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Admin Token
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(request()->segment(2) == '') ? 'active' : ''}}" aria-current="page"
                    href="{{route('admin.dashboard.merchants.index')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Merchants
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(request()->segment(2) == '') ? 'active' : ''}}" aria-current="page"
                    href="{{route('admin.dashboard.transactions.index')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Transaction List
                </a>
            </li>
        </ul>
    </div>
</nav> --}}

<nav id="sidebarMenu" class="col-md-5 col-lg-2 d-md-block  sidebar collapse">
    <div class="position-sticky pt-3 sidebar-merchant" style="height: 100%; width: 100%">
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a class="" aria-current="page"
                    href="{{ route('admin.dashboard.admintokens.index') }}" style="text-align: center">
                    <button class="btnsidebar-merchant {{(request()->segment(3) == 'admintokens') ? 'active' : ''}}">Admin Token</button>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="" aria-current="page"
                    href="{{ route('admin.dashboard.merchants.index') }}" style="text-align: center">
                    <button class="btnsidebar-merchant {{(request()->segment(3) == 'merchants') ? 'active' : ''}}">Merchants</button>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="" aria-current="page"
                    href="{{ route('admin.dashboard.transactions.index') }}" style="text-align: center">
                    <button class="btnsidebar-merchant {{(request()->segment(3) == 'transactions') ? 'active' : ''}}">Transaction List</button>
                </a>
            </li>
        </ul>
    </div>
</nav>