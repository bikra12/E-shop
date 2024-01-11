<style>
    .navbar-custom {

        background-image: linear-gradient(to right, #635fe0, #b8d6e2);
        border: none;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
        color: rgb(6, 6, 6);
        transition: color 0.3s ease;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link:focus {
        color: #004d73;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .search-wrapper {
        position: relative;
        width: 60%;
        /* Giving more width to the search bar */
        /* margin: 0 auto; */
        margin: 10px 46px -5px 30px;
    }

    .search-input {
        padding-right: 40px;

        border-radius: 20px;
        width: 100%;
    }

    .search-btn {
        position: absolute;
        right: 10px;
        top: 40%;
        transform: translateY(-50%);
        background: none;
        border: none;
    }


    .search-btn:hover {
        background-color: #555;
    }


  /* Add this to your CSS file or style section */
.dropdown-menu {
    border-radius: 0;
    background-color: #87CEEB;
    padding: 10px; /* Add padding to the dropdown menu items */
    margin-top: 10px; /* Add margin to the top of the dropdown menu */
}

/* .dropdown-item {
    margin: 7px 33px 27px 0px; /* Add margin to each dropdown item */
 
.dropdown-item {
    margin: 5px 33px 7px 0px; /* Add margin to each dropdown item */
    padding: 8px 20px !important; /* Add padding to each dropdown item */
}

.dropdown-item:hover {
    background-color: #add8e6;
}

/* Add this to adjust the positioning of the dropdown menu */
.dropdown:hover .dropdown-menu {
    display: block;
    position: absolute;
    top: 100%; /* Adjust the distance from the top */
    left: 0; /* Adjust the distance from the left */
}

    .navbar-nav .nav-item {
        margin-left: 30px;
        /* Adjust the margin as needed */
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="{{ url('/home') }}" style="font-size: 2em;">E-shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="search-wrapper">
            <form action="{{ route('search') }}" method="get" class="search-form">
                <input type="text" class="search-input form-control"
                    placeholder="Search products, brands and more..." name="query">
                <button type="submit" class="search-btn"><i class="fa fa-search"
                        style="color: rgb(52, 49, 49);"></i></button>
            </form>
        </div>

        <ul class="navbar-nav ">

            {{-- <li class="nav-item px-2">
                <a class="nav-link" href="{{ url('/about') }}">About</a>
            </li> --}}
            <li class="nav-item dropdown ">
                @if (Auth::check())
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user fa-lg mr-2"></i> <!-- Adjusted icon size and added margin -->
                        <span style="font-size: 1.2em;">{{ Auth::user()->first_name }}</span>
                        <!-- Display user's first name when logged in with increased font size -->
                    </a>

                    <div class="dropdown-menu dropdown-login" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ url('/user/dashboard') }}">
                            <i class="fas fa-user fa-fw"></i>
                            <span class="ml-2">My Profile</span>
                        </a>
                        <a class="dropdown-item" href="{{ url('/order/confirmation') }}">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                            <span class="ml-2">Order</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-heart fa-fw"></i>
                            <span class="ml-2">Wishlist</span>
                        </a>
                        <a class="dropdown-item" href="{{ url('/logout') }}">
                            <i class="fas fa-sign-out-alt fa-fw"></i>
                            <span class="ml-2">Logout</span>
                        </a>
                    </div>
                @else
                    <a class="nav-link" href="{{ url('/login') }}">
                        <i class="fas fa-user fa-lg mr-2"></i> <!-- Adjusted icon size and added margin -->
                        <span style="font-size: 1.2em;">Login</span>
                    </a>
                @endif
            </li>


            <li class="nav-item px-2">
                <a class="nav-link mb-2" href="{{ route('cart.view') }}">
                    <i class="fa fa-shopping-cart "></i>
                    <span class="ml-2" style="font-size: 1.2em;">Cart</span></a>
            </li>

            <li class="nav-item px-2">
                <a class="nav-link mb-20" href="{{ url('/contactUs') }}">
                    <i class="fas fa-envelope"></i>
                    <span class="ml-2" style="font-size: 1.2em;">Contact Us</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
