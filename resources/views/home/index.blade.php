
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turbo - Car Wash Free Bootstrap5 HTML Website Template</title>

    <!--vendor css ================================================== -->
    <link rel="stylesheet" href="/css/vendor.css">


    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!--Bootstrap ================================================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Style Sheet ================================================== -->

    <link rel="stylesheet" href="/css/style.css">

    <!-- Google Fonts ================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,400;6..12,600;6..12,700&family=Oswald:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- script ================================================== -->
    <script src="/js/modernizr.js"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#header-nav" tabindex="0">


<nav class="navbar fixed-top navbar-expand-lg container-fluid p-4">
    @if(session('tracking_code'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            Tracking Code: {{ session('tracking_code') }}

            <p> <a href="#" onclick="addMoreServices(event)">add more services</a>  or <a href="{{ route('receipt.show', request('user_id')) }}">check your receipt</a></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="images/main-logo-light.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
            <iconify-icon icon="system-uicons:menu-hamburger" class="hamburger-menu"></iconify-icon>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
             aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul
                    class="navbar-nav align-items-center justify-content-end justify-content-xxl-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase  active mx-2 px-3 mb-2 mb-lg-0"
                           aria-current="page" href="index.html">home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase  mx-2 px-3 mb-2 mb-lg-0"
                           href="#price">booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase  mx-2 px-3 mb-2 mb-lg-0" href="#">Track your reservations</a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>

<section id="hero" style="background-image:url(images/banner1-img.jpg);">
    <div class="container padding-large">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <p class="header-top text-white mb-4">best car wash in the town</p>
                <h2 class="display-1 text-white mb-5">Turbo car wash</h2>

            </div>
        </div>
    </div>
</section>

<section id="price" class="my-5">
    <div style="overflow: hidden;">
        <div class="container py-5" data-aos="zoom-out">

            <p class="header-top">Pricing plans</p>
            <h2 class="display-4 mb-5 ">Services</h2>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="regular-tab-pane" role="tabpanel"
                     aria-labelledby="regular-tab" tabindex="0">
                    <div class="row py-4">
                        @foreach($services as $service)
                            <div class="col-lg-4 pb-4">
                                <div class="py-5 plan-post text-center">

                                    <p class="header-top">{{$service->name}}</p>
                                    <h2 class="display-5 mb-5">{{$service->price}}</h2>
                                    <div class="price-option">
                                        <p><span class="price-tick">✓</span>{{$service->duration_minutes}} minutes</p>
                                        <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                        <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                        <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    </div>

                                    <a href="{{ route('reservations.create', ['id' => $service->id]) }}" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                        <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="tab-pane fade" id="medium-tab-pane" role="tabpanel" aria-labelledby="medium-tab"
                     tabindex="0">
                    <div class="row py-4">
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="0">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Basic</p>
                                <h2 class="display-5 mb-5">$18.95</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="300">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Deluxe</p>
                                <h2 class="display-5 mb-5">$30.50</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="600">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Ultimate</p>
                                <h2 class="display-5 mb-5">$49.40</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Ipsum dolor</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="900">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">ultra ultimate</p>
                                <h2 class="display-5 mb-5">$80.50</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> It ir ivamus</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> lit mir iamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="van-tab-pane" role="tabpanel" aria-labelledby="van-tab" tabindex="0">
                    <div class="row py-4">
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="0">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Basic</p>
                                <h2 class="display-5 mb-5">$20.95</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="300">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Deluxe</p>
                                <h2 class="display-5 mb-5">$33.50</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="600">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Ultimate</p>
                                <h2 class="display-5 mb-5">$54.40</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Ipsum dolor</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="900">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">ultra ultimate</p>
                                <h2 class="display-5 mb-5">$90.50</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> It ir ivamus</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> lit mir iamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="truck-tab-pane" role="tabpanel" aria-labelledby="truck-tab"
                     tabindex="0">
                    <div class="row py-4">
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="0">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Basic</p>
                                <h2 class="display-5 mb-5">$30.95</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="300">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Deluxe</p>
                                <h2 class="display-5 mb-5">$40.50</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="600">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Ultimate</p>
                                <h2 class="display-5 mb-5">$68.40</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Ipsum dolor</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="900">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">ultra ultimate</p>
                                <h2 class="display-5 mb-5">$101.50</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> It ir ivamus</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> lit mir iamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cargo-tab-pane" role="tabpanel" aria-labelledby="cargo-tab"
                     tabindex="0">
                    <div class="row py-4">
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="0">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Basic</p>
                                <h2 class="display-5 mb-5">$50.95</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="300">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Deluxe</p>
                                <h2 class="display-5 mb-5">$78.50</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="600">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">Ultimate</p>
                                <h2 class="display-5 mb-5">$97.40</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Ipsum dolor</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pb-4" data-aos="fade-up" data-aos-easing="ease-in-sine"
                             data-aos-delay="900">
                            <div class="py-5 plan-post text-center">

                                <p class="header-top">ultra ultimate</p>
                                <h2 class="display-5 mb-5">$150.50</h2>
                                <div class="price-option">
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                                    <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                                    <p><span class="price-tick">✓</span> It ir ivamus</p>
                                    <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                                    <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                                    <p><span class="price-tick">✓</span> lit mir iamus</p>
                                </div>

                                <a href="booking.html" class="btn btn-primary mt-3 px-4 py-3 mx-2 ">Book now
                                    <iconify-icon icon="tabler:arrow-right" class="arrow-icon"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="info">
    <div style="overflow: hidden;">
        <div class="container" data-aos="zoom-out">
            <div class="row align-items-center ">
                <div class="col-md-4 text-center padding-medium border-end">
                    <p class="header-top mb-4">Why choose us</p>
                    <p class="mb-2">+123 222 333 44</p>
                    <p class="mb-2">+123 666 777 88</p>
                </div>
                <div class="col-md-4 text-center padding-medium border-end">
                    <p class="header-top mb-4">Working hours</p>
                    <p class="mb-2">Sat - Fri : 9 am - 9 pm</p>
                </div>
                <div class="col-md-4 text-center padding-medium">
                    <p class="header-top mb-4">Our address</p>
                    <p class="mb-2">13 Rue Montmartre 75001, Paris, France</p>
                    <p class="mb-2">13 Rue Martre 75001, Paris, France</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="footer">
    <div class="container footer-containerG mt-5 mt-md-0 pt-3">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 my-5 py-5 ">

            <div class=" col-md-3 my-5 mt-md-0 ">
                <img src="images/logo-dark.png" alt="" class="">
                <p class="my-4">Velit sed ante in nisl amet sapien. Mauris a ullamcorper ut iaculis. Et massa non eu
                    ac tristique assa non eu ac tristique.</p>
                <div class="d-flex align-items-center ">
                    <a href="#" target="_blank"><iconify-icon class="social-icon-footer active pe-4"
                                                              icon="mdi:facebook"></iconify-icon></a>
                    <a href="#" target="_blank"><iconify-icon class="social-icon-footer pe-4"
                                                              icon="mdi:twitter"></iconify-icon></a>
                    <a href="#" target="_blank"><iconify-icon class="social-icon-footer pe-4"
                                                              icon="mdi:instagram"></iconify-icon></a>
                    <a href="#" target="_blank"><iconify-icon class="social-icon-footer pe-4"
                                                              icon="mdi:linkedin"></iconify-icon></a>
                    <a href="#" target="_blank"><iconify-icon class="social-icon-footer pe-4"
                                                              icon="mdi:youtube"></iconify-icon></a>
                </div>

            </div>

            <div class="col-md-2 offset-md-1">
                <h5 class="fs-5 mt-3 mt-md-0 mb-3">About us</h5>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">About
                            us</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">WHo are
                            we</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">Why
                            choose us</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">Our
                            history</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5 class="fs-5 mt-3 mt-md-0 mb-3">Our services</h5>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">Our
                            history</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">Tiring
                            dressing</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">Wheel
                            shine</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">Interior
                            vacuum</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 ">
                <h5 class="fs-5 mt-3 mt-md-0 mb-3">Contact us</h5>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">Our
                            location</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#"
                                                             class="nav-link text-uppercase p-0 ">Contact</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#"
                                                             class="nav-link text-uppercase p-0 ">Address</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#"
                                                             class="nav-link text-uppercase p-0 ">Facebook</a></li>
                </ul>
            </div>
            <div class="col-md-2 ">
                <h5 class="fs-5 mt-3 mt-md-0 mb-3">More info</h5>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item footer-list mb-3"><a href="#"
                                                             class="nav-link text-uppercase p-0 ">VEhicle</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#" class="nav-link text-uppercase p-0 ">bike</a>
                    </li>
                    <li class="nav-item footer-list mb-3"><a href="#"
                                                             class="nav-link text-uppercase p-0 ">Scooter</a>
                    </li>
                </ul>
            </div>




        </footer>
    </div>



    <footer class="d-flex flex-wrap justify-content-between align-items-center border-top"></footer>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 pt-4">
            <div class="col-md-6 d-flex align-items-center">
                <p>© 2023 Turbo, Carwash | All Rights Reserved</p>

            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <p class="">© 2023 Designed By:<a href="https://templatesjungle.com/"
                                                  class="website-link text-decoration-none" target="_blank"> <b>TemplatesJungle</b></a></p>
            </div>

        </footer>
    </div>
</section>



<!-- script ================================================== -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
<script>

    function addMoreServices(event) {
        event.preventDefault();

        var priceSection = document.getElementById('price');

        if (priceSection) {

            priceSection.scrollIntoView({ behavior: 'smooth' }); // Smooth scrolling
        }
    }


</script>

</body>

</html>
