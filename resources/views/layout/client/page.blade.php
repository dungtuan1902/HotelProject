@extends('templates.client.layout')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Blog</h2>
                    <div class="bt-option">
                        <a href="./home.html">Home</a>
                        <span>Blog Grid</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            @foreach ($page as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{Storage::url($item->image)}}">
                    <div class="bi-text">
                        
                        <h4><a href="{{route('page_detail_client',['id'=>$item->id])}}"><span class="b-tag">{{$item->title}}</span></a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> {{$item->created_at}}</div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                <div class="room-pagination">
                    {{$page->links()}}
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection