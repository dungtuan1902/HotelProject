<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper ">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
    <div class="search-icon  search-switch">
        <i class="icon_search"></i>
    </div>
    <div class="header-configure-area">
        <a href="#" class="bk-btn">Booking Now</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li class="active"><a href="{{ route('client') }}">Home</a></li>
            <li><a href="{{ route('room_client') }}">Rooms</a></li>
            <li><a href="{{ route('about_client') }}">About Us</a></li>
            <li><a href="{{ route('page_client') }}">Pages</a>

            </li>
            <li><a href="{{ route('contact_client') }}">Contact</a></li>
            @can('isClient')
                <li><a href="{{ route('login') }}">Profile</a>
                    <ul class="dropdown">
                        {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            @endcan
            @cannot('isClient')
                <li><a href="{{ route('login') }}">Login</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="">Forget Password</a></li>
                        {{-- <li><a href="">Register</a></li> --}}
                        {{-- <li><a href="{{ route('logout') }}">Logout</a></li> --}}
                    </ul>
                </li>
            @endcannot
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-tripadvisor"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> {{ $hotel->tel }}</li>
        <li><i class="fa fa-envelope"></i> {{ $hotel->email }}</li>
    </ul>
</div>
