@extends('templates.client.layout')
@section('content')
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img width="800px" height="500px" src="{{ asset(Storage::url($detail->image)) }}" alt="">
                        <div class="d-flex justify-content-center ">
                            @foreach ($img_description as $item)
                                <a data-fslightbox="mygalley" class="rounded-2 mx-2" target="_blank" data-type="image"
                                    href="{{ Storage::url($item) }}" class="item-thumb">
                                    <img width="200" height="150" class="rounded-2" src="{{ Storage::url($item) }}" />
                                </a>
                            @endforeach
                        </div>

                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{ $detail->name }}</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <a href="#">Booking Now</a>
                                </div>
                            </div>
                            <h2>{{ $detail->price }}$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion {{ $detail->soLuong }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para">{{ $detail->description }}</p>
                            <p>{{ $detail->note }}
                            </p>
                        </div>
                    </div>
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="img/room/avatar/avatar-1.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="img/room/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="#" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <h5 class="my-2">You Rating:</h5>
                                        <div>
                                            <input class="star star-5" id="star-5" type="radio" name="star" />

                                            <label class="star star-5" for="star-5"></label>

                                            <input class="star star-4" id="star-4" type="radio" name="star" />

                                            <label class="star star-4" for="star-4"></label>

                                            <input class="star star-3" id="star-3" type="radio" name="star" />

                                            <label class="star star-3" for="star-3"></label>

                                            <input class="star star-2" id="star-2" type="radio" name="star" />

                                            <label class="star star-2" for="star-2"></label>

                                            <input class="star star-1" id="star-1" type="radio" name="star" />

                                            <label class="star star-1" for="star-1"></label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_phong" value="{{ $detail->id }}">
                                    <textarea placeholder="Your Review"></textarea>
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Your Reservation</h3>
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
                                <select id="guest" name="soLuong">
                                    <option value="1">1 Adults</option>
                                    <option value="2">2 Adults</option>
                                    <option value="4">4 Adults</option>
                                    <option value="8">8 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select name="soPhong" id="room">
                                    <option value="1">1 Room</option>
                                    <option value="2">2 Room</option>
                                </select>
                            </div>
                            <input type="hidden" name="id_phong" value="{{$detail->id}}">
                            <button type="submit">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
