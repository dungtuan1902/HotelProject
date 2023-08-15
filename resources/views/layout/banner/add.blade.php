@extends('templates.admin.layout')
@section('content')
    <div class="container-fluid p-2 border border-2 border-white rounded-2 my-5">
        <form class="row g-3" action="{{ route('insert_banner') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputname4" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputname4" name="name">
                @if ($errors->has('name'))
                    <p><small class="px-2 text-danger">{{ $errors->first('name') }}</small></p>
                @endif

            </div>
            <div class="col-md-6">
                <label for="inputlink4" class="form-label">Link</label>
                <input type="text" class="form-control" id="inputlink4" name="link">
                @if ($errors->has('link'))
                    <p><small class="px-2 text-danger">{{ $errors->first('link') }}</small></p>
                @endif
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">File Image</label>
                <input type="file" class="@error('image') is-invalid @enderror form-control" name="image"
                    id="image" accept="image/*">
            </div>
            <div class="col-md-6">
                <img id="image_preview" style="width: 200px ; height:100px"
                    src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="User">
            </div>
            <label for="">Action</label>
            <div class="col-12">
               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="action" id="inlineRadio1" value="1" checked>
                    <label class="form-check-label" for="inlineRadio1">Enabled</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="action" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">Disabled</label>
                  </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection
