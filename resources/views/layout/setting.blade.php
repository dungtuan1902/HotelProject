@extends('templates.admin.layout')
@section('content')
    <div class="container-fluid p-2 border border-2 border-white rounded-2">
        <form class="row g-3" action="{{ route('edit_hotel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputname4" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputname4" {{ $disable }} value="{{ $hotel->name }}"
                    name="name">
            </div>
            <div class="col-md-6">
                <label for="inputphone4" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputphone4"{{ $disable }} value="{{ $hotel->tel }}"
                    name="tel">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress"{{ $disable }}
                    value="{{ $hotel->address }}" name="address">

            </div>
            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputAddress2"{{ $disable }} value="{{ $hotel->email }}"
                    name="email">

            </div>
            <div class="col-md-6">
                <label for="inputfanpage4" class="form-label">Fanpage</label>
                <input type="text" class="form-control" id="inputfanpage4"{{ $disable }}
                    value="{{ $hotel->fanpage }}" name="fanpage">
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">File Image</label>
                <input type="file" class="@error('image') is-invalid @enderror form-control"{{ $disable }}
                    name="image" id="image" accept="image/*">
            </div>
            <div class="col-md-6">
                <img id="image_preview" style="width: 200px ; height:100px" src="{{ Storage::url($hotel->image) }}"
                    alt="User">
            </div>
            <div class="col-md-6">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="@error('image') is-invalid @enderror form-control"{{ $disable }}
                    name="logo" id="logo" accept="image/*">
            </div>
            <div class="col-md-6">
                <img id="image_logo" style="width: 200px ; height:100px" src="{{ Storage::url($hotel->logo) }}"
                    alt="User">
            </div>
            <div class="col-12">


                @if ($disable == '')
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a name="" id="" class="btn btn-danger" href="{{ route('hotel') }}"
                        role="button">Cancel</a>
                @else
                    <a name="" id="" class="btn btn-primary" href="{{ route('edit_hotel') }}"
                        role="button">Edit</a>
                @endif
            </div>
        </form>
    </div>
@endsection
