@extends('templates.client.layout')
@section('content')
    <div class="container my-3">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        <div class="card">
            <div class="row">
                <div class="col-2 ">
                    <img width="100px" class="p-3" height="100px" src="{{ Storage::url($hotel->logo) }}" alt="Title">
                </div>
                <div class="col-10 d-flex justify-content-end d-flex align-items-center">
                    <h2 class="px-5 text-warning">Transaction history</h2>
                </div>
                <div class="row mx-2">
                    <div class="col-8 d-flex flex-column">
                        <h3>Hello , {{ $user->name }}</h3>
                        <p>Thank you !</p>
                    </div>

                </div>
            </div>
            <div class="card-body booking-form">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Room</th>
                            <th scope="col">People</th>
                            <th scope="col">Number Room</th>
                            <th scope="col">Check in</th>
                            <th scope="col">Check out</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($tran as $item)
                            @php
                                
                                $array = changeColor($room, $item->id_phong);
                            @endphp
                            <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{ $array['name'] }}</td>
                                <td>{{ $item->soLuong }}</td>
                                <td>{{ $item->soPhong }}</td>
                                <td>{{ $item->checkin }}</td>
                                <td>{{ $item->checkout }}</td>
                                <td>
                                    {{ $item->pttt == 1 ? 'Direct payment' : 'Online payment' }}
                                </td>
                                <td>$ {{ $item->total }}</td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure !')" href="{{ route('bill_cancel_client', ['id' => $item->id]) }}">Cancel</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
