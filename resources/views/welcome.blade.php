@extends('frontend.layouts.app')
@section('content')
@section('title', 'Home')
<!--Header-Section -->
<div class="home-header-section">
    @include('frontend.layouts.topbar')
    @include('frontend.layouts.bar')
    <!-- BANNER-SECTION -->
    <div class="home-banner-section overflow-hidden">
        <div class="banner-container-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 mb-md-0 mb-4 text-lg-left text-center">
                        <div class="home-banner-text" data-aos="fade-up">
                            <h1>{{ $Banner->banner_heading ?? 'Care That Feels Like Family' }}</h1>
                            <p class="banner-paragraph">
                                {{ $Banner->banner_text ??
                                    'Duis aute irure dolor in reprehenderit in voluptate velit es
                                                                                                                                                                                                                                                                cillum dolore eu fugiat nulla pariatur excepteur sint occae
                                                                                                                                                                                                                                                                cupidatat non proident' }}
                            </p>
                            <div class="banner-btn discover-btn-banner">
                                <a href="{{ route('placement.request') }}" class="text-decoration-none">PLACMENT REQUEST</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MENU-SECTION -->
<div class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="menu-section-img">
                    <figure>
                        @if (isset($menuImage->image))
                            <img src="{{ asset('menu/picture/' . $menuImage->image) }}" alt=""
                                class="img-fluid">
                        @else
                            <img src="{{ asset('assets/images/menu-section-left-img.webp') }}" alt=""
                                class="img-fluid">
                        @endif
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    @if (isset($menuItems) && $menuItems->count() > 0)
                        @foreach ($menuItems as $item)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="menu-right-section">
                                    <figure>
                                        <img src="{{ asset('menu/icons/' . $item->menu_icon) }}" alt=""
                                            class="img-fluid">
                                    </figure>
                                    <h5>{{ $item->menu_title }}</h5>
                                    <p>{{ $item->menu_description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="menu-right-section">
                                <figure>
                                    <img src="{{ asset('assets/images/menu-icon1.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                                <h5>Professional Care</h5>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="menu-right-section">
                                <figure>
                                    <img src="{{ asset('assets/images/menu-icon1.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                                <h5>Professional Care</h5>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="menu-right-section">
                                <figure>
                                    <img src="{{ asset('assets/images/menu-icon1.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                                <h5>Professional Care</h5>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="menu-right-section">
                                <figure>
                                    <img src="{{ asset('assets/images/menu-icon1.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                                <h5>Professional Care</h5>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form-Section -->
<section class="form-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="left-section" data-aos="fade-up">
                    @if (!isset($formSection))
                        <h2>Your Health is Our Primary <span class="concern">Concern</span></h2>
                    @else
                        @php
                            $words = explode(' ', $formSection->form_heading);
                            $lastWord = array_pop($words); // remove last word
                            $firstPart = implode(' ', $words); // remaining words
                        @endphp

                        <h2>
                            @if (!empty($firstPart))
                                {{ $firstPart }}
                            @endif
                            <span class="concern">{{ $lastWord }}</span>
                        </h2>
                    @endif
                    <p>
                        @if (!isset($formSection))
                            Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillu dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatt non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        @else
                            {{ $formSection->form_description }}
                        @endif
                    </p>
                    <ul class="list-unstyled list-margin-bottom">
                        <li class="d-inline-block mb-lg-0 mb-3"><i class="fa-solid fa-check ml-0"></i><span
                                class="d-inline-block email-span text-decoration-none list-span">
                                @if (isset($formSection) && $formSection->form_bulletPoint1)
                                    {{ $formSection->form_bulletPoint1 }}
                                @else
                                    Quis aute irure dolor in reprehenderit
                                @endif
                            </span>
                        </li>
                         <li class="d-inline-block mb-lg-0 mb-3 mt-3"><i class="fa-solid fa-check ml-0"></i><span
                                class="d-inline-block user-span text-decoration-none list-span">
                                @if (isset($formSection) && $formSection->form_bulletPoint2)
                                    {{ $formSection->form_bulletPoint2 }}
                                @else
                                    Quis nostrud
                                    exercit
                                @endif
                            </span></li>
                    </ul>
                    <ul class="list-unstyled left-section-margin-bottom">
                         <li class="d-inline-block mb-lg-0 mb-3"><i class="fa-solid fa-check ml-0"></i><span
                                class="d-inline-block email-span text-decoration-none list-span">
                                @if (isset($formSection) && $formSection->form_bulletPoint3)
                                    {{ $formSection->form_bulletPoint3 }}
                                @else
                                    Quis aute irure dolor in reprehenderit
                                @endif
                            </span></li>
                         <!--<li class="d-inline-block mb-lg-0 mb-3"><i class="fa-solid fa-check ml-0"></i><span-->
                         <!--       class="d-inline-block user-span text-decoration-none list-span">-->
                         <!--       @if (isset($formSection) && $formSection->form_bulletPoint4)-->
                         <!--           {{ $formSection->form_bulletPoint4 }}-->
                         <!--       @else-->
                         <!--           Quis nostrud-->
                         <!--           exercit-->
                         <!--       @endif-->
                         <!--   </span></li>-->
                    </ul>
                    {{-- <div class="banner-btn discover-btn-banner primary-button">
                        <a href="about.html" class="text-decoration-none">Read More</a>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="right-section">
                    <form action="https://html.designingmedia.com/sencare/get">
                        <h2>Schedule a Free Consultation</h2>
                        <div class="input-icons">
                            <div class="form-group position-relative">
                                <input type="text" class="form-control input-text" id="validationCustom01"
                                    placeholder="Your name" required=""><i class="fa fa-user icon1"></i>
                            </div>
                            <div class="form-group position-relative">
                                <input type="text" class="form-control input-text" id="validationCustom02"
                                    placeholder="Phone number" required=""><i class="fa-solid fa-phone icon2"></i>
                            </div>
                            <div class="form-group position-relative">
                                <input type="text" class="form-control input-text" id="validationCustom03"
                                    placeholder="Date & time" required=""><i
                                    class="fa-solid fa-calendar-days icon3"></i>
                            </div>
                            <div class="form-group form-margin-bottom position-relative">
                                <input type="text" class="form-control input-text" id="validationCustom04"
                                    placeholder="Location" required=""><i
                                    class="fa-sharp fa-solid fa-location-dot icon4"></i>
                            </div>
                        </div>
                         <div class="banner-btn discover-btn-banner">
                            <a href="#" class="text-decoration-none" style="background-color: white;color:#BB8EE0">Book Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Choose-us-section -->
<div class="choose-us-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 pt-2">
                <figure>
                    @if (isset($chooseUsPicture->picture))
                        <img src="{{ asset('chooseUs/picture/' . $chooseUsPicture->picture) }}" alt=""
                            class="img-fluid">
                    @else
                        <img src="{{ asset('assets/images/why-chooseus-img.webp') }}" alt=""
                            class="img-fluid">
                    @endif
                </figure>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="chooseus-content position-relative">
                    <h2 class="why-chooseus">Why Choose <span class="concern">Us</span></h2>
                    @if (isset($choseUsItems) && $choseUsItems->count() > 0)
                        @foreach ($choseUsItems as $item)
                            <div class="chooseus-content-box" data-aos="fade-up">
                                <figure class="float-left mb-0 pt-2">
                                    <img class="img-fluid" src="{{ asset('chooseUs/icons/' . $item->icon) }}"
                                        alt="">
                                </figure>
                                <div class="chooseus-content-box-content float-left">
                                    <h4 class="chooseus-title">{{ $item->title }}</h4>
                                    <p class="chooseus-p">{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="chooseus-content-box" data-aos="fade-up">
                            <figure class="float-left mb-0 pt-2">
                                <img class="img-fluid" src="{{ asset('assets/images/why-chooseus-icon1.png') }}"
                                    alt="">
                            </figure>
                            <div class="chooseus-content-box-content float-left">
                                <h4 class="chooseus-title">Medical Record</h4>
                                <p class="chooseus-p">Quis autem vel eum iure reprehenderit qui in eareu voluptate
                                    velit esse quam nihil molestiae.</p>
                            </div>
                        </div>
                        <div class="chooseus-content-box" data-aos="fade-up">
                            <figure class="float-left mb-0 pt-2">
                                <img class="img-fluid" src="{{ asset('assets/images/why-chooseus-icon1.png') }}"
                                    alt="">
                            </figure>
                            <div class="chooseus-content-box-content float-left">
                                <h4 class="chooseus-title">Ambulance</h4>
                                <p class="chooseus-p">Quis autem vel eum iure reprehenderit qui in eareu voluptate
                                    velit esse quam nihil molestiae.</p>
                            </div>
                        </div>
                        <div class="chooseus-content-box" data-aos="fade-up">
                            <figure class="float-left mb-0 pt-2">
                                <img class="img-fluid" src="{{ asset('assets/images/why-chooseus-icon1.png') }}"
                                    alt="">
                            </figure>
                            <div class="chooseus-content-box-content float-left">
                                <h4 class="chooseus-title">Medical Advice</h4>
                                <p class="chooseus-p">Quis autem vel eum iure reprehenderit qui in eareu voluptate
                                    velit esse quam nihil molestiae.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our-teams-section -->
@if (isset($placments) && $placments->count() > 0)
    <div class="Our-teams-section">
        <div class="container">
            <h2 class="text-center">Facilities for<span class="concern"> Placements </span></h2>
            <p class="teams-title">
                {{ $text->text ??
                    'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' }}
            </p>
            <div class="row" data-aos="fade-up">
                @foreach ($placments as $item)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <figure class="text-center teams1">
                            <img src="{{ asset('facilitis/picture/' . $item->image) }}" alt=""
                                class="img-fluid">
                        </figure>
                        <div class="teams-content">
                            <h4>{{ $item->title }}</h4>
                            <p>{{ $item->description }}.</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@include('frontend.layouts.clients')
@endsection
