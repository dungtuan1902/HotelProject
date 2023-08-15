@extends('templates.admin.layout')
@section('content')
    <div class="container-fluid p-2 border border-2 border-white rounded-2 my-5">
        <form class="row g-3" action="{{ route('insert_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputAddress" name="title">
                    @if ($errors->has('title'))
                        <p><small class="px-2 text-danger">{{ $errors->first('title') }}</small></p>
                    @endif
                </div>
                <div class="col-12">
                    <label for="image" class="form-label">File Image</label>
                    <input type="file" class="@error('image') is-invalid @enderror form-control" name="image"
                        id="image" accept="image/*">
                </div>
                <div class="col-md-6 my-2">
                    <img id="image_preview" style="width: 300px ; height:150px"
                        src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                        alt="User">
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="" rows="4"></textarea>
                    </div>
                    @if ($errors->has('content'))
                    <p><small class="px-2 text-danger">{{ $errors->first('content') }}</small></p>
                @endif
                </div>
            </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
    </form>
    </div>
@endsection