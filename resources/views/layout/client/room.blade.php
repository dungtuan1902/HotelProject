@extends('templates.client.layout')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Our Rooms</h2>
                    <div class="bt-option">
                        <a href="{{route('client')}}">Home</a>
                        <span>Rooms</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            @foreach ($room as $item)
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <img style="width: 200px ; height: 200px" src="{{asset(Storage::url($item->image))}}" alt="">
                    <div class="ri-text">
                        <h4>{{$item->name}}</h4>
                        <h3>{{$item->price}}$<span>/Pernight</span></h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion {{$item->soLuong}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <a href="{{route('detail_room_client',['id'=>$item->id])}}" class="primary-btn">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
            
            <div class="col-lg-12">
                <div class="room-pagination">
                    {{$room->links()}}
                </div>
            </div>
        </div>
    </div>
   
</section>
@endsection