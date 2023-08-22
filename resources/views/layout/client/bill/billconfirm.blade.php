@extends('templates.client.layout')
@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="row">
                <div class="col-2 ">
                    <img width="100px" class="p-3" height="100px" src="{{ Storage::url($hotel->logo) }}" alt="Title">
                </div>
                <div class="col-10 d-flex justify-content-end d-flex align-items-center">
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
                <form class="row g-3" action="{{ route('billconfirm_client') }}" method="POST">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Room</th>
                                <th scope="col">People</th>
                                <th scope="col">Number Room</th>
                                <th scope="col">Check in</th>
                                <th scope="col">Check out</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $bill['name'] }}</th>
                                <td>{{ $bill['soLuong'] }}</td>
                                <td>{{ $bill['soPhong'] }}</td>
                                <td>{{ $bill['checkin'] }}</td>
                                <td>{{ $bill['checkout'] }}</td>
                                <td>
                                    {{ $bill['payment'] == 1 ? 'Direct payment' : 'Online payment' }}
                                </td>
                                <td>$ {{ $bill['total'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $user->id }}">
                    <input type="hidden" name="id_km" value="{{ $bill['id_km'] }}">
                    <input type="hidden" name="soLuong" value="{{ $bill['soLuong'] }}">
                    <input type="hidden" name="soPhong" value="{{ $bill['soPhong'] }}">
                    <input type="hidden" name="checkin" value="{{ $bill['checkin'] }}">
                    <input type="hidden" name="checkout" value="{{ $bill['checkout'] }}">
                    <input type="hidden" name="total" value="{{ $bill['total'] }}">
                    <input type="hidden" name="payment" value="{{ $bill['payment'] }}">
                    <input type="hidden" name="id_phong" value="{{ $bill['id_phong'] }}">
                    <div class="d-flex justify-content-between d-flex align-items-end">
                        <div>
                            <a name="" id="" class="btn btn-secondary px-3 text-white"
                                href="{{ route('room_client') }}" role="button"><svg xmlns="http://www.w3.org/2000/svg"
                                    height="1.5em"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        svg {
                                            fill: #e0e0e0
                                        }
                                    </style>
                                    <path
                                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                                </svg></a>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-warning rounded-2 text-warning">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
