<nav id="sidebarMenu" class="col-md-5 col-lg-2 d-md-block bg-white sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a class="" aria-current="page"
                    href="{{ route('merchant.dashboard.profile') }}" style="text-align: center">
                    <button class="btnsidebar-merchant {{(request()->segment(3) == 'profile') ? 'active' : ''}}">Profile</button>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="" aria-current="page"
                    href="{{ route('merchant.dashboard.product.index') }}" style="text-align: center">
                    <button class="btnsidebar-merchant {{(request()->segment(3) == 'product') ? 'active' : ''}}">Product</button>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="" aria-current="page"
                    href="{{ route('merchant.dashboard.transaction') }}" style="text-align: center">
                    <button class="btnsidebar-merchant {{(request()->segment(3) == 'transaction') ? 'active' : ''}}">Transaction</button>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="" aria-current="page"
                    href="{{ route('merchant.dashboard.wallet.index') }}" style="text-align: center">
                    <button class="btnsidebar-merchant {{(request()->segment(3) == 'wallet') ? 'active' : ''}}">Wallet</button>
                </a>
            </li>
        </ul>
    </div>
</nav>