<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo d-flex ">
                            <a href="{{ route('client') }}">
                                <img width="150px" height="100px" src="{{ asset(Storage::url($hotel->logo)) }}"
                                    alt="">
                            </a>
                            <p class="mx-2">We inspire and reach millions of travelers across 90 local websites</p>
                        </div>

                        <div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="ft-contact">
                        <h6>Contact Us</h6>
                        <ul>
                            <li>Phone : {{ $hotel->tel }}</li>
                            <li>Email : {{ $hotel->email }}</li>
                            <li>Address : {{ $hotel->address }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="ft-newslatter">
                        <h6>New latest</h6>
                        <p>Get the latest updates and offers.</p>
                        <form action="#" class="fn-form">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
