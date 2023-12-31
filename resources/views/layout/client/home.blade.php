@extends('templates.client.layout')
@section('content')
    <div class="container-fluid">
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero-text">
                            <h1>{{ $hotel->name }}</h1>
                            <p>Here are the best hotel booking sites, including recommendations for international
                                travel and for finding low-priced hotel rooms.</p>
                            <a href="{{ route('room_client') }}" class="primary-btn">Discover Now</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                        <div class="booking-form">
                            @csrf
                            <h3>Booking Your Hotel</h3>
                            <form action="{{ route('check') }}" method="POST">
                                @csrf
                                <div class="check-date">
                                    <label for="date-in">Check In:</label>
                                    <input type="text" name="checkin" class="date-input" id="date-in">
                                    <i class="icon_calendar"></i>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Check Out:</label>
                                    <input type="text" name="checkout" class="date-input" id="date-out">
                                    <i class="icon_calendar"></i>
                                </div>
                                <div class="select-option">
                                    <label for="guest">Guests:</label>
                                    <select name="soLuong" id="guest">
                                        <option value="1">1 Adults</option>
                                        <option value="2">2 Adults</option>
                                        <option value="4">4 Adults</option>
                                        <option value="8">8 Adults</option>
                                    </select>
                                </div>
                                <div class="select-option">
                                    <label for="room">Room:</label>
                                    <select name="soPhong" id="room">
                                        <option value="">1 Room</option>
                                        <option value="">2 Room</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id_phong">
                                <button type="submit">Check Availability</button>
                                @if (Session::has('errors'))
                                    <div class="alert alert-danger text-center mt-2" role="alert">
                                        <strong>{{ Session('errors')->first('message1') }}
                                        <span>
                                            <a href="{{route('room_client')}}">Click here</a>
                                        </span>
                                        </strong>
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slider owl-carousel">
                @foreach ($banner as $item)
                    <div class="hs-item set-bg" data-setbg="{{ asset(Storage::url($item->image)) }}"></div>
                @endforeach
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- About Us Section Begin -->
        <section class="aboutus-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-text">
                            <div class="section-title">
                                <span>About Us</span>
                                <h2>Intercontinental LA <br />Westlake Hotel</h2>
                            </div>
                            <p class="f-para">Sona.com is a leading online accommodation site. We’re passionate about
                                travel. Every day, we inspire and reach millions of travelers across 90 local websites
                                in 41
                                languages.</p>
                            <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                                apartment, guest house, or tree house, we’ve got you covered.</p>
                            <a href="#" class="primary-btn about-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-pic">
                            <div class="row">
                                @foreach ($room as $item)
                                    <div class="col-sm-6 my-2">
                                        <img style="width: 75px; height: 150px" src="{{ Storage::url($item->image) }}"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Section End -->

        <!-- Services Section End -->
        <section class="services-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>What We Do</span>
                            <h2>Discover Our Services</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-item">
                            <i class="flaticon-036-parking"></i>
                            <h4>Travel Plan</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-item">
                            <i class="flaticon-033-dinner"></i>
                            <h4>Catering Service</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-item">
                            <i class="flaticon-026-bed"></i>
                            <h4>Babysitting</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-item">
                            <i class="flaticon-024-towel"></i>
                            <h4>Laundry</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-item">
                            <i class="flaticon-044-clock-1"></i>
                            <h4>Hire Driver</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-item">
                            <i class="flaticon-012-cocktail"></i>
                            <h4>Bar & Drink</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Section End -->

        <!-- Home Room Section Begin -->
        <section class="hp-room-section">
            <div class="container-fluid">
                <div class="hp-room-items">
                    <div class="row">
                        @foreach ($room as $item)
                            <div class="col-lg-3 col-md-6">
                                <div class="hp-room-item set-bg" data-setbg="{{ asset(Storage::url($item->image)) }}">
                                    <div class="hr-text">
                                        <h3>{{ $item->name }}</h3>
                                        <h2>{{ $item->price }}$<span>/Pernight</span></h2>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="r-o">Size:</td>
                                                    <td>{{ $item->soLuong }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="r-o">Capacity:</td>
                                                    <td>Max persion {{ $item->soLuong }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="#" class="primary-btn">More Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Home Room Section End -->

        <!-- Testimonial Section Begin -->
        <section class="testimonial-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>Testimonials</span>
                            <h2>What Customers Say?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="testimonial-slider owl-carousel">
                            <div class="ts-item">
                                <p>After a construction project took longer than expected, my husband, my daughter and I
                                    needed a place to stay for a few nights. As a Chicago resident, we know a lot about
                                    our
                                    city, neighborhood and the types of housing options available and absolutely love
                                    our
                                    vacation at Sona Hotel.</p>
                                <div class="ti-author">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <h5> - Alexander Vasquez</h5>
                                </div>
                                {{-- <img src="img/testimonial-logo.png" alt=""> --}}
                            </div>
                            <div class="ts-item">
                                <p>After a construction project took longer than expected, my husband, my daughter and I
                                    needed a place to stay for a few nights. As a Chicago resident, we know a lot about
                                    our
                                    city, neighborhood and the types of housing options available and absolutely love
                                    our
                                    vacation at Sona Hotel.</p>
                                <div class="ti-author">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <h5> - Alexander Vasquez</h5>
                                </div>
                                {{-- <img src="img/testimonial-logo.png" alt=""> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial Section End -->

        <!-- Blog Section Begin -->
        <section class="blog-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>Hotel News</span>
                            <h2>Our Blog & Event</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($post as $item)
                        <div class="col-lg-4">
                            <div class="blog-item set-bg" data-setbg="{{ Storage::url($item->image) }}">
                                <div class="bi-text">
                                    <h4><a href="{{ route('page_detail_client', ['id' => $item->id]) }}"><span
                                                class="b-tag">{{ $item->title }}</span></a></h4>
                                    <div class="b-time"><i class="icon_clock_alt"></i>{{ $item->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Blog Section End -->
    </div>
@endsection
