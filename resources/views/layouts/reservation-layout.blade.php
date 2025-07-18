<!DOCTYPE html>
<html lang="en">

<head>
    <title>SmartStay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user-layout/css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Harbor<span>lights</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="/user/homepage" class="nav-link">Home</a></li>
                    <li class="nav-item active"><a href="rooms.html" class="nav-link">Our Rooms</a></li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About Us</a></li>
                    @auth
                        <li class="nav-item"><a href="/logout" class="nav-link">Log Out</a></li>
                    @else
                        <li class="nav-item"><a href="login.html" class="nav-link">Login</a></li>
                    @endauth
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span
                                class="mr-2"><a href="rooms.html">Rooms</a></span> <span>Rooms Single</span></p>
                        <h1 class="mb-4 bread">Rooms Details</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="room-img" style="background-image: url(images/room-4.jpg);"></div>
                                </div>
                                <div class="item">
                                    <div class="room-img" style="background-image: url(images/room-5.jpg);"></div>
                                </div>
                                <div class="item">
                                    <div class="room-img" style="background-image: url(images/room-6.jpg);"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">

                            <h2 class="mb-4">Luxury Room <span>- (4 Available rooms)</span></h2>
                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the
                                skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline
                                of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she
                                continued her way.</p>
                            <div class="d-md-flex mt-5 mb-5">
                                <ul class="list">
                                    <li><span>Max:</span> 3 Persons</li>
                                    <li><span>Size:</span> 45 m2</li>
                                </ul>
                                <ul class="list ml-md-5">
                                    <li><span>View:</span> Sea View</li>
                                    <li><span>Bed:</span> 1</li>
                                </ul>
                            </div>
                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the
                                skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline
                                of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she
                                continued her way.</p>
                        </div>
                        <div class="col-md-12 room-single ftco-animate mb-5 mt-4">
                            <h3 class="mb-4">Take A Tour</h3>
                            <div class="block-16">
                                <figure>
                                    <img src="images/room-4.jpg" alt="Image placeholder" class="img-fluid">
                                    <a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span
                                            class="icon-play"></span></a>
                                </figure>
                            </div>
                        </div>

                        <div class="col-md-12 room-single ftco-animate mb-5 mt-4">
                            <h3 class="mb-4">Book Now!</h3>
                            <div class="block-16">
                                @yield('space-work')
                            </div>
                        </div>

                        <div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Review &amp; Ratings</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" class="star-rating">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i> 100
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star-o"></i> 30
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i> 5
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star-o"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i> 0
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i> 0
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate pl-md-5">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            <li><a href="#">Properties <span>(12)</span></a></li>
                            <li><a href="#">Home <span>(22)</span></a></li>
                            <li><a href="#">House <span>(37)</span></a></li>
                            <li><a href="#">Villa <span>(42)</span></a></li>
                            <li><a href="#">Apartment <span>(14)</span></a></li>
                            <li><a href="#">Condominium <span>(140)</span></a></li>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                        about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Oct 30, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                        about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Oct 30, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                        about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Oct 30, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">dish</a>
                            <a href="#" class="tag-cloud-link">menu</a>
                            <a href="#" class="tag-cloud-link">food</a>
                            <a href="#" class="tag-cloud-link">sweet</a>
                            <a href="#" class="tag-cloud-link">tasty</a>
                            <a href="#" class="tag-cloud-link">delicious</a>
                            <a href="#" class="tag-cloud-link">desserts</a>
                            <a href="#" class="tag-cloud-link">drinks</a>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                            necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente
                            consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->


    <footer class="ftco-footer ftco-section img" style="background-image: url(images/bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Harbor Lights</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Useful Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Rooms</a></li>
                            <li><a href="#" class="py-2 d-block">Amenities</a></li>
                            <li><a href="#" class="py-2 d-block">Gift Card</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Privacy</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Career</a></li>
                            <li><a href="#" class="py-2 d-block">About Us</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                        Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('assets/user-layout/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/aos.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('assets/user-layout/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/user-layout/js/main.js') }}"></script>

</body>

</html>
