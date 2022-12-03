<nav class="navbar navbar-expand-lg p-3">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}"><span class="text-success">Green Leaf Restaurant</span> </a>
    <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-dark"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 300px;">

        <li class="nav-item">
            <a style="font-size: 18px" class="nav-link" href="{{ url('/') }}">Home</a>
        </li>

        <li class="nav-item">
            <a style="font-size: 18px" class="nav-link" href="{{ url('about') }}">About</a>
        </li>

        <li class="nav-item">
            <a style="font-size: 18px" class="nav-link" href="{{ url('contact') }}">Contact</a>
        </li>

        </ul>
        <a class="d-flex ml-auto">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 100px;">
                <li class="nav-item dropdown">
                    <a style="text-transform: uppercase;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img height="20px" width="20px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUh3k9PBWmPFALGyMwCNsaukw4H-y-B2LxHA&usqp=CAU" alt="">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ url('user/cart/list') }}">Cart List</a>
                      <a class="dropdown-item" href="{{ url('user/order/list') }}">Order List</a>
                      @if (Auth::check())
                        <a class="dropdown-item" href="@route('admin.dashboard')">Admin Dashboard</a>
                      @else
                        <a class="dropdown-item" href="{{ url('login') }}">Login</a>
                      @endif

                    </div>
                  </li>
                </ul>
            <div>
                <a href="{{ url('user/cart/list') }}">
                <i class="fas fa-shopping-cart"> <span style="color: cornflowerblue;">
                    {{ count($carts) }}
                </span></i>
            </a>
            </div>
        </a>
    </div>
    </div>
</nav>
