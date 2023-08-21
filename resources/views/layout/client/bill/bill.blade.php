@extends('templates.client.layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-2 ">
                    <img width="100px" class="p-3" height="100px" src="{{ Storage::url($hotel->logo) }}" alt="Title">
                </div>
                <div class="col-10 d-flex justify-content-end d-flex align-items-center ">
                    <h2 class="px-5 text-warning">Invoice</h2>
                </div>
                <div class="row mx-2">
                    <div class="col-8 d-flex flex-column">
                        <h3>Hello , {{ $user->name }}</h3>
                        <p>Thank you for your order</p>
                    </div>
                    <div class="col-4 d-flex justify-content-end d-flex align-items-center ">
                        <span class="px-5">{{ Now()->toDateString() }}</span>
                    </div>
                </div>
            </div>
            <div class="card-body booking-form">
                <form class="row g-3" action="{{ route('bill_client') }}" method="POST">
                    @csrf
                    <div class="col-6 check-date">
                        <label for="date-in">Check In:</label>
                        <input type="text" name="checkin" class="date-input" value="{{ $param['checkin'] }}"
                            id="date-in">
                        <i class="icon_calendar"></i>
                    </div>
                    <div class="col-6 check-date">
                        <label for="date-out">Check Out:</label>
                        <input type="text" name="checkout" class="date-input" value="{{ $param['checkout'] }}"
                            id="date-out">
                        <i class="icon_calendar"></i>
                    </div>
                    <div class="col-6">
                        <div class="select-option">
                            <label for="guest">Guests:</label>
                            <select name="soLuong" id="guest">
                                <option value="1" {{ $param['soLuong'] == 1 ? 'selected' : '' }}>1 Adults</option>
                                <option value="2" {{ $param['soLuong'] == 2 ? 'selected' : '' }}>2 Adults</option>
                                <option value="4" {{ $param['soLuong'] == 4 ? 'selected' : '' }}>4 Adults</option>
                                <option value="8" {{ $param['soLuong'] == 8 ? 'selected' : '' }}>8 Adults</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="select-option">
                            <label for="room">Room:</label>
                            <select name="soPhong" id="room">
                                <option value="1" {{ $param['soLuong'] == 1 ? 'selected' : '' }}>1 Room</option>
                                <option value="2" {{ $param['soLuong'] == 2 ? 'selected' : '' }}>2 Room</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="select-option">
                            <label for="room">Payment</label>
                            <select name="payment" id="room">
                                <option value="1">Direct payment</option>
                                <option value="2">Online payment</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Code
                            promotion</label>
                        <input type="text" class="form-control" name="id_km" aria-describedby="helpId" placeholder="">

                    </div>
                    <input type="hidden" name="id_phong" value="{{ $param['id_phong'] }}">
                    <div class="d-flex justify-content-between d-flex align-items-end">
                        <div>
                            <a name="" id="" class="btn btn-warning px-3 text-white"
                                href="{{ route('detail_room_client', ['id' => $param['id_phong']]) }}" role="button"><svg
                                    xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                    viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        svg {
                                            fill: #ffffff
                                        }
                                    </style>
                                    <path
                                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                </svg></a>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-primary rounded-2">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
