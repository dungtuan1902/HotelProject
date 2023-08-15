@extends('templates.admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                        href="{{ Storage::url($detail->image) }}">
                        <img style="max-width: 100%; max-height: 50vh; margin: auto;" class="rounded-4 fit"
                            src="{{ Storage::url($detail->image) }}" />
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    @foreach ($img_description as $item)
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href="{{ Storage::url($item) }}" class="item-thumb">
                            <img width="100" height="100" class="rounded-2" src="{{ Storage::url($item) }}" />
                        </a>
                    @endforeach

                </div>
                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        {{ $detail->name }}

                    </h4>
                    <div class="mb-3">
                        <span class="h5">${{ $detail->price }}</span>
                        <span class="text-muted">/room</span>
                    </div>

                    <p>
                        {{ $detail->description }}
                    </p>

                    <div class="row border me-1 my-3 rounded-2 p-2 bg-white">
                        <dt class="col-3">Room Number :</dt>
                        <dd class="col-9">
                            {{ $detail->id < 10 ? '00'.$detail->id : ($detail->id < 100 ? '0' . $detail->id : $detail->id) }}
                        </dd>
                        <dt class="col-3">Quantity:</dt>
                        <dd class="col-9"> ${{ $detail->soLuong }} </dd>

                        <dt class="col-3">Promotion</dt>
                        <dd class="col-9">{{ $detail->id_km }}</dd>

                        <dt class="col-3">Note</dt>
                        <dd class="col-9">{{ $detail->note }}</dd>
                        <dt class="col-3">Action</dt>
                        <dd class="col-9">
                            {{ $detail->action == 1 ? 'Empty' : ($detail->action == 2 ? 'Full' : 'Processing') }}</dd>
                    </div>

                    <hr />
                    <a href="{{ route('room') }}" class="btn btn-warning shadow-0">Back</a>
                </div>
            </main>
        </div>
    </div>
@endsection
