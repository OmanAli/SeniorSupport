@extends('frontend.layouts.app')
@section('title', 'About Us')
@section('content')
    <!-- Top-Header-Section -->
    <div class="home-header-section sub-header-section">
        @include('frontend.layouts.topbar')
        @include('frontend.layouts.bar')
        <!-- BANNER-SECTION -->
        <div
            class="home-banner-section overflow-hidden home-banner-section2 home-banner-section1 sub-banner faq-page-banner">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4 text-md-left text-center d-flex align-items-center">
                            <div class="home-banner-text" data-aos="fade-up">
                                <div class="banner-btn discover-btn-banner">
                                    <a class="text-decoration-none about-btn">Home <span class="next-btn"> > </span> <span
                                            class="about-span"> FAQ</span></a>
                                </div>
                                <h2>Frequently Asked Questions About Senior Care & Placement</h2>
                                <p class="banner-paragraph about-us-p">{{ $banner->description ?? 'Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur' }}.</p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="banner-img-section position-relative">
                                <figure class="banner-img2-figure">
                                    <img src="{{ asset('assets/images/faq-banner.png') }}" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offer-section -->
@if($faqs->count() > 0)
<div class="offer-section about-offer-section contact-offer-section frequently-asked-section" data-aos="fade-up">
    <h2 class="offer-heading">
        Frequently Asked <span class="support">Questions</span>
    </h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                @foreach ($faqs as $index => $faq)
                    <div class="cyber-content accordian-text position-relative">
                        <div class="accordian-inner">
                            <div id="accordion{{ $index }}">
                                <div class="accordion-card {{ $loop->last ? 'accordion-card5-margin' : '' }}">

                                    <!-- Heading -->
                                    <div id="heading{{ $index }}">
                                        <a href="#"
                                           class="btn btn-link text-decoration-none {{ $index != 0 ? 'collapsed' : '' }}"
                                           data-toggle="collapse"
                                           data-target="#collapse{{ $index }}"
                                           aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                           aria-controls="collapse{{ $index }}">
                                            <h5>{{ $faq->question }}</h5>
                                        </a>
                                    </div>

                                    <!-- Body -->
                                    <div id="collapse{{ $index }}"
                                         class="collapse {{ $index == 0 ? 'show' : '' }}"
                                         aria-labelledby="heading{{ $index }}">
                                        <div class="card-body p-0">
                                            <p class="text-left accordian-text-color">
                                                {{ $faq->answer }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endif

@endsection
