<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Basic Test 2 Lawson</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::segment(1) === 'user' ? 'active' : '' }}"
                        href="{{ route('user.index') }}">User</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ Request::segment(1) === 'city' ? 'active' : '' }}"
                        href="{{ route('city.index') }}">City</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ Request::segment(1) === 'merchant' ? 'active' : '' }}"
                        href="{{ route('merchant.index') }}">Merchant</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ Request::segment(1) === 'product' ? 'active' : '' }}"
                        href="{{ route('product.index') }}">Product</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ Request::segment(1) === 'master' ? 'active' : '' }}"
                        href="{{ route('master.index') }}">Master Status</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ Request::segment(1) === 'orderItems' ? 'active' : '' }}"
                        href="{{ route('orderItems.index') }}">Order</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::segment(1) === 'sales' ? 'active' : '' }}" href="/sales">Sales</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
