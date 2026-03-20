@extends('frontend.layouts.app')
@section('title', 'About Us')
@section('content')
    <!-- Top-Header-Section -->
    <div class="home-header-section sub-header-section">
        @include('frontend.layouts.topbar')
        @include('frontend.layouts.bar')
        <!-- BANNER-SECTION -->
        <div class="home-banner-section overflow-hidden home-banner-section2 home-banner-section1 sub-banner">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4 text-md-left text-center d-flex align-items-center">
                            <div class="home-banner-text" data-aos="fade-up">
                                <div class="banner-btn discover-btn-banner">
                                    <a class="text-decoration-none about-btn">Home <span class="next-btn"> > </span> <span
                                            class="about-span"> About Us</span></a>
                                </div>
                                <h2>About Us</h2>
                                <p class="banner-paragraph about-us-p">
                                    {{ $banner->description ??
                                        ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="banner-img-section position-relative">
                                <figure class="banner-img2-figure">
                                    <img src="{{ asset('assets/images/about-banner-img.png') }}" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offer-section -->
    <div class="offer-section offer-section1 about-offer-section" data-aos="fade-up">
        <h2 class="offer-heading">We offer you the <span class="support">best support</span></h2>
        <div class="container">
            <div class="row">
                @if (isset($offers) && $offers->count() > 0)
                    @foreach ($offers as $offer)
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-lg-0 mb-md-0 mb-3">
                            <div class="offer-section-box">
                                <div class="offer-section-inner">
                                    <figure>
                                        <img src="{{ asset('offer/icons/' . $offer->icon) }}" alt=""
                                            class="img-fluid">
                                    </figure>
                                </div>
                                <h5>{{ $offer->title ?? '' }}</h5>
                                <p>{{ $offer->description ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-lg-0 mb-md-0 mb-3">
                        <div class="offer-section-box">
                            <div class="offer-section-inner">
                                <figure>
                                    <img src="{{ asset('assets/images/offer-section-img1.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                            </div>
                            <h5>We’re here to help</h5>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-lg-0 mb-md-0 mb-3">
                        <div class="offer-section-box">
                            <div class="offer-section-inner">
                                <figure>
                                    <img src="{{ asset('assets/images/offer-section-img1.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                            </div>
                            <h5>Our Mission</h5>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-lg-0 mb-md-0 mb-3">
                        <div class="offer-section-box">
                            <div class="offer-section-inner">
                                <figure>
                                    <img src="{{ asset('assets/images/offer-section-img1.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                            </div>
                            <h5>Careers</h5>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Popup-Section -->
    <div class="offer-section popup-section position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-lg-0 mb-md-0 mb-3">
                    <h2 data-aos="fade-up">Welcome to Senior<span class="support">Support</span></h2>
                    <p>{{ $welcome->description ??
                        'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                            anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat.' }}
                    </p>
                    <div class="popup-btn">
                        <a href="{{ route('placement.request') }}">Find Care For Your Loved Ones</a>
                    </div>
                    <h4>Need clinical advice?</h4>
                    <h4 class="popup-section-number">{{ systemConfig('phone') ?? 'N/A' }}</h4>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 mb-lg-0 mb-md-0 mb-3">
                    <div class="video-section-box">

                        <a class="popup-vimeo" href="#">
                            <figure class="mb-0">
                                @if (isset($welcomeImage) && $welcomeImage->picture)
                                    <img src="{{ asset('welcom/picture/' . $welcomeImage->picture) }}"
                                        style="cursor: pointer" alt="" class="img-fluid video-img">
                                @else
                                    <img src="{{ asset('assets/images/popup-video-img.png') }}" style="cursor: pointer"
                                        alt="" class="img-fluid video-img">
                                @endif
                            </figure>
                        </a>
                        <figure class="position-absolute popup-top-figure">
                            <img src="{{ asset('assets/images/video-section-top-img.png') }}" alt=""
                                class="img-fluid">
                        </figure>
                        <figure class="position-absolute popup-bottom-figure">
                            <img src="{{ asset('assets/images/video-section-bottom-img.png') }}" alt=""
                                class="img-fluid">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter-Section -->
    <div class="counter-section2">
        <div class="container">
            <div class="counter-inner-row">
                @if (isset($counter) && $counter->count() > 0)
                    @foreach ($counter as $key => $item)
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-lg-0 mb-md-0 mb-sm-2">
                                <div class="counter-inner-box vl-border">
                                    <h5><span class="counter">{{ $item->counter_value }}</span></h5>
                                    <p>{{ $item->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-lg-0 mb-md-0 mb-sm-2">
                            <div class="counter-inner-box vl-border">
                                <h5><span class="counter">45</span></h5>
                                <p>Donations Every Year</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-lg-0 mb-md-0 mb-sm-2">
                            <div class="counter-inner-box vl-right-border">
                                <h5><span class="counter">690</span></h5>
                                <p>Great Local Volunteers</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-lg-0 mb-md-0 mb-sm-2">
                            <div class="counter-inner-box">
                                <h5><span class="counter">150</span>+</h5>
                                <p>Families Assisted</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-lg-0 mb-md-0 mb-sm-2">
                            <div class="counter-inner-box border-right-box">
                                <h5><span class="counter">40</span>+</h5>
                                <p>Trusted Communities</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('frontend.layouts.clients')
@endsection
