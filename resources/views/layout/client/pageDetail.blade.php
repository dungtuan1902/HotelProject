@extends('templates.client.layout')
@section('content')
<section class="blog-details-hero set-bg" data-setbg="{{Storage::url($page->image)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="bd-hero-text">
                    <span>Travel Trip & Camping</span>
                    <h2>{{$page->title}}</h2>
                    <ul>
                        <li class="b-time"><i class="icon_clock_alt"></i> {{$page->created_at}}</li>
                        {{-- <li><i class="icon_profile"></i> Kerry Jones</li> --}}
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
                        <p>{{$page->content}}</p>
                    </div>
                    <div class="comment-option">
                        <h4>2 Comments</h4>
                        <div class="single-comment-item first-comment">
                            <div class="sc-author">
                                <img src="img/blog/blog-details/avatar/avatar-1.jpg" alt="">
                            </div>
                            <div class="sc-text">
                                <span>27 Aug 2019</span>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                    dolore magnam.</p>
                                <a href="#" class="comment-btn">Like</a>
                                <a href="#" class="comment-btn">Reply</a>
                            </div>
                        </div>
                        <div class="single-comment-item reply-comment">
                            <div class="sc-author">
                                <img src="img/blog/blog-details/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="sc-text">
                                <span>27 Aug 2019</span>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                    dolore magnam.</p>
                                <a href="#" class="comment-btn like-btn">Like</a>
                                <a href="#" class="comment-btn reply-btn">Reply</a>
                            </div>
                        </div>
                        <div class="single-comment-item second-comment ">
                            <div class="sc-author">
                                <img src="img/blog/blog-details/avatar/avatar-3.jpg" alt="">
                            </div>
                            <div class="sc-text">
                                <span>27 Aug 2019</span>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                    dolore magnam.</p>
                                <a href="#" class="comment-btn">Like</a>
                                <a href="#" class="comment-btn">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="leave-comment my-5">
                        <h4>Leave A Comment</h4>
                        <form action="#" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12 text-center">
                                    <input type="text" placeholder="Website">
                                    <textarea placeholder="Messages"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->



@endsection