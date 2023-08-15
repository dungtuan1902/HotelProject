@extends('templates.admin.layout')
@section('content')
    
    <section class="blog-details-hero set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-hero-text">
                        <h2>{{$post->title}}</h2>
                        <ul>
                            <li class="b-time"><i class="icon_clock_alt"></i> {{$post->created_at}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-text">
                        <div class="bd-title">
                            <p>{{$post->content}}</p>
                        </div>
                        <img width="800px" src="{{Storage::url($post->image )}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a class="mx-5 my-2 rounded-3 btn btn-secondary" href="{{route('post')}}">Back</a>

@endsection
