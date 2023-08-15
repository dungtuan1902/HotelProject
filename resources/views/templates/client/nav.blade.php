<header class="header-section ">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> {{ $hotel->tel }}</li>
                        <li><i class="fa fa-envelope"></i> {{ $hotel->email }}</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        {{-- <div class="top-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div> --}}
                        <a href="#" class="bk-btn">Booking Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="active"><a href="{{ route('client') }}">Home</a></li>
                                <li><a href="{{ route('room_client') }}">Rooms</a></li>
                                <li><a href="{{ route('about_client') }}">About Us</a></li>
                                <li><a href="./pages.html">Pages</a>
                                   
                                </li>
                                <li><a href="{{ route('contact_client') }}">Contact</a></li>
                                <li><a href="{{route('login')}}">Login</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('register')}}">Register</a></li>
                                        <li><a href="{{route('logout')}}">Logout</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                        <div class="nav-right search-switch">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
