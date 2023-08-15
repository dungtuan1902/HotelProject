@extends('templates.admin.layout')
@section('content')
    <div class="container-fluid p-2 border border-2 border-white rounded-2">
        <form class="row g-3" action="{{ route('edit_phong', ['id' => $room->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputname4" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputname4" name="name" value="{{ $room->name }}">
                @if ($errors->has('name'))
                    <p><small class="px-2 text-danger">{{ $errors->first('name') }}</small></p>
                @endif

            </div>
            <div class="col-md-6">
                <label for="inputphone4" class="form-label">Type Room</label>
                <select class="form-select" name="id_lp" aria-label="Default select example">
                    @foreach ($typeroom as $item)
                        <option {{ $room->id_lp == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputusername4" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="inputusername4" value="{{ $room->soLuong }}" name="soLuong">
                @if ($errors->has('soLuong'))
                    <p><small class="px-2 text-danger">{{ $errors->first('soLuong') }}</small></p>
                @endif
            </div>
            <div class="col-md-4">
                <label for="inputpass4" class="form-label">Price</label>
                <input type="number" class="form-control" id="inputpass4" value="{{ $room->price }}" name="price">
                @if ($errors->has('price'))
                    <p><small class="px-2 text-danger">{{ $errors->first('price') }}</small></p>
                @endif
            </div>
            <div class="col-md-4">
                <label for="inputphone4" class="form-label">Promotion <span class="badge rounded-pill text-bg-primary">If
                        any !</span></label>
                <select class="form-select" name="id_km" aria-label="Default select example">
                    <option value="0" selected>Open this select menu</option>
                    @foreach ($khuyenmai as $item)
                        <option {{ $room->id_km == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">File Image</label>
                <input type="file" class="@error('image') is-invalid @enderror form-control" name="image"
                    id="image" accept="image/*">
            </div>
            <div class="col-md-6">
                <img id="image_preview" style="width: 200px ; height:100px" src="{{ Storage::url($room->image) }}"
                    alt="User">
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Image Descrition</label>
                <input type="file" class=" form-control" name="images[]" id="images" accept="image/*" multiple>
            </div>
            <div class="col-md-6">
                <div class="mt-1">
                    <label for="">Last Images</label>
                    <div>
                        @php
                            $img = explode('|', $room->img_descrition, -1);
                        @endphp
                        @foreach ($img as $item)
                            <img id="image_preview" style="width: 200px ; height:100px" src="{{ Storage::url($item) }}"
                                alt="User">
                        @endforeach
                    </div>

                </div>

                <div class="mt-1">
                    <label for="">New Images</label>
                    <div class="images-preview-div">

                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="change" value="0" id="" checked>
                    <label class="form-check-label" for="">
                        Delete Last Images
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="change" value="1" id="">
                    <label class="form-check-label" for="">
                        Keep Last Images and Insert Image
                    </label>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
                $(function() {
                    // Multiple images preview with JavaScript
                    var previewImages = function(input, imgPreviewPlaceholder) {
                        if (input.files) {
                            var filesAmount = input.files.length;
                            for (i = 0; i < filesAmount; i++) {
                                var reader = new FileReader();
                                reader.onload = function(event) {
                                    $($.parseHTML('<img>')).addClass("col-md-3 mx-1").attr('src', event.target
                                        .result).appendTo(
                                        imgPreviewPlaceholder);
                                }
                                reader.readAsDataURL(input.files[i]);
                            }
                        }
                    };
                    $('#images').on('change', function() {
                        previewImages(this, 'div.images-preview-div');
                    });
                });
            </script>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Descrition</label>
                    <textarea class="form-control" name="description" id="" rows="3">{{ $room->description }}</textarea>
                    @if ($errors->has('description'))
                        <p><small class="px-2 text-danger">{{ $errors->first('description') }}</small></p>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Note</label>
                    <textarea class="form-control" name="note" id="" rows="3">{{ $room->note }}</textarea>
                    @if ($errors->has('note'))
                        <p><small class="px-2 text-danger">{{ $errors->first('note') }}</small></p>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="radio" class="btn-check" name="action" id="btncheck1"
                        {{ $room->action == 1 ? 'checked' : '' }} value="1">
                    <label class="btn btn-outline-primary" for="btncheck1">Empty</label>

                    <input type="radio" class="btn-check" name="action"
                        id="btncheck2"{{ $room->action == 2 ? 'checked' : '' }} value="2">
                    <label class="btn btn-outline-primary" for="btncheck2">
                        Processing</label>

                    <input type="radio" class="btn-check" name="action"
                        id="btncheck3"{{ $room->action == 3 ? 'checked' : '' }} value="3">
                    <label class="btn btn-outline-primary" for="btncheck3">Full</label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
