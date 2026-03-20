@extends('frontend.layouts.app')

@section('title', 'Donate')

    @push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/donate.css') }}">
@endpush

@section('content')
<div class="home-header-section sub-header-section">
    @include('frontend.layouts.topbar')
    @include('frontend.layouts.bar')
</div>

    {{-- hero section --}}
    <section class="donate-hero-section position-relative d-flex align-items-center justify-content-center py-5 py-lg-6 px-3">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 text-center text-white">
                    <h1 class="display-4 display-md-3 fw-bold mb-4">
                        Become a <span class="text-purple">Hero</span>
                    </h1>
                    <p class="lead fs-4 mb-3">
                        Be the Reason a Senior Finds the Right Home.
                    </p>
                    <p class="mb-4 opacity-75">
                        Your generosity fuels our mission and helps families navigate one of the most important decisions of their lives. Every contribution—no matter the size—supports safe, compassionate placement solutions for seniors in need.
                    </p>
                    <a href="#donate-form" class="btn btn-purple btn-lg rounded-pill px-5 py-3 d-inline-flex align-items-center gap-2 text-decoration-none">
                        Donate Now
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         DONATION FORM SECTION
         ============================================ -->
    <section id="donate-form" class="py-5 py-lg-6 donation-form-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-8 text-center">
                    <h2 class="fw-bold display-5 mb-3">Make Your <span class="text-purple">Gift</span> Today</h2>
                    <p class="text-muted fs-5">Your generosity today helps a senior find the right place to call home tomorrow.</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-6">
                    <div class="donate-form-card">

                        <form action="{{route('DonateSubmit')}}" method="POST">
                            @csrf

                            <!-- Name/Organization -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Name / Organization
                                </label>
                                <input type="text" name="name" class="form-input-custom" placeholder="Enter your name or organization" required>
                            </div>

                            <!-- Telephone Number -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Telephone Number
                                </label>
                                <input type="tel" name="phone" class="form-input-custom" placeholder="Enter your phone number" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                    Email Address
                                </label>
                                <input type="email" name="email" class="form-input-custom" placeholder="name@example.com" required>
                            </div>

                            <!-- Desired Amount -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Desired Amount to Donate
                                </label>
                                <div class="amount-wrapper">
                                    <span class="amount-icon">$</span>
                                    <input type="number" name="amount" class="form-input-custom amount-input" placeholder="0.00" min="1" step="0.01" required>
                                </div>
                            </div>

                            <!-- Message/Comment (Optional) -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Message / Comment <small class="text-muted">(Optional)</small>
                                </label>
                                <textarea name="message" class="form-input-custom" rows="3" placeholder="Leave a message..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-submit-donate">
                                Donate Now
                                <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         WHY DONATE SECTION
         ============================================ -->
    <section class="py-5 py-lg-6 bg-white">
        <div class="container">

            <!-- Section Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-8 text-center">
                    <h2 class="fw-bold display-5 mb-4">
                        Why <span class="text-purple">Donate</span>?
                    </h2>
                    <p class="fs-5 text-secondary lh-lg">
                        At Senior Support Solutions, we believe every senior deserves dignity, safety, and the right care environment. Your donation directly supports families searching for assisted living, memory care, and long-term support options.
                    </p>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h3 class="fw-semibold h4 text-dark">When you give, you help:</h3>
                </div>
            </div>


<div class="row why-donate-row g-2 g-md-4">

    <!-- Card 1 -->
    <div class="col-6 col-lg-3 d-flex">

        <div class="card w-100 border-0 shadow-sm rounded-4 p-3 text-center hover-shadow transition-all d-flex flex-column" style="min-height: 180px;">
            <div class="mb-2">
                <i class="fas fa-users fa-2x text-purple"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                <p class="card-text card-text-dark text-secondary mb-0 small">
                Provide free senior placement assistance to families
                </p>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
  <div class="col-6 col-lg-3 d-flex">

        <div class="card w-100 border-0 shadow-sm rounded-4 p-3 text-center hover-shadow transition-all d-flex flex-column" style="min-height: 180px;">
            <div class="mb-2">
                <i class="fas fa-building fa-2x text-purple"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                <p class="card-text card-text-dark text-secondary mb-0 small">
                Connect seniors with trusted assisted living and memory care communities
                </p>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="col-6 col-lg-3 d-flex">

        <div class="card w-100 border-0 shadow-sm rounded-4 p-3 text-center hover-shadow transition-all d-flex flex-column" style="min-height: 180px;">
            <div class="mb-2">
                <i class="fas fa-heart fa-2x text-purple"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                <p class="card-text card-text-dark text-secondary mb-0 small">
            Offer guidance and emotional support during care transitions
                </p>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
   <div class="col-6 col-lg-3 d-flex">

        <div class="card w-100 border-0 shadow-sm rounded-4 p-3 text-center hover-shadow transition-all d-flex flex-column" style="min-height: 180px;">
            <div class="mb-2">
                <i class="fas fa-globe fa-2x text-purple"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                <p class="card-text card-text-dark text-secondary mb-0 small">
               Expand outreach to families who may not know where to turn
                </p>
            </div>
        </div>
    </div>

</div>

            <!-- Bottom Text -->
            <div class="row mt-5">
                <div class="col-12 col-lg-8 mx-auto text-center">
                    <p class="fs-5 fw-medium text-dark">
                        Your support is not just a gift — it is an investment in stability, security, and compassionate care for seniors.
                    </p>
                </div>
            </div>

        </div>
    </section>

       <!-- ============================================
         OUR IMPACT SECTION
         ============================================ -->
    <section class="py-5 py-lg-6 bg-light">
        <div class="container">

            <!-- Section Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-8 text-center">
                    <h2 class="fw-bold display-5 mb-3">
                        Our <span class="text-purple">Impact</span>
                    </h2>
                    <p class="fs-5 text-secondary">
                        Transparency matters. Here's how your support makes a difference:
                    </p>
                </div>
            </div>


            <div class="row g-4 g-md-3 impact-cards-row">

                <!-- $25 -->
               <div class="col-6 col-lg-3 d-flex">

                    <div class="card w-100 border-0 shadow rounded-4 text-center p-3 p-md-4 bg-white d-flex flex-column justify-content-center impact-card">
                        <div class="card-body p-2 p-md-3">
                            <h3 class="display-5 fw-bold text-purple mb-2 mb-md-3">$25</h3>
                            <p class="card-text card-text-dark text-secondary small mb-0">
                                supports outreach materials to help one family find guidance
                            </p>
                        </div>
                    </div>
                </div>

                <!-- $50 -->
               <div class="col-6 col-lg-3 d-flex">

                    <div class="card w-100 border-0 shadow rounded-4 text-center p-3 p-md-4 bg-white d-flex flex-column justify-content-center impact-card">
                        <div class="card-body p-2 p-md-3">
                            <h3 class="display-5 fw-bold text-purple mb-2 mb-md-3">$50</h3>
                            <p class="card-text card-text-dark text-secondary small mb-0">
                                assists in conducting personalized senior care consultations
                            </p>
                        </div>
                    </div>
                </div>

                <!-- $100 -->
               <div class="col-6 col-lg-3 d-flex">

                    <div class="card w-100 border-0 shadow rounded-4 text-center p-3 p-md-4 bg-white d-flex flex-column justify-content-center impact-card">
                        <div class="card-body p-2 p-md-3">
                            <h3 class="display-5 fw-bold text-purple mb-2 mb-md-3">$100</h3>
                            <p class="card-text card-text-dark text-secondary small mb-0">
                                helps expand referral and placement services
                            </p>
                        </div>
                    </div>
                </div>

                <!-- $500+ -->
             <div class="col-6 col-lg-3 d-flex">

                    <div class="card w-100 border-0 shadow rounded-4 text-center p-3 p-md-4 bg-white d-flex flex-column justify-content-center impact-card">
                        <div class="card-body p-2 p-md-3">
                            <h3 class="display-5 fw-bold text-purple mb-2 mb-md-3">$500+</h3>
                            <p class="card-text card-text-dark text-secondary small mb-0">
                                supports broader community education and senior advocacy initiatives
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Text -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="fs-5 text-secondary">
                        Every dollar is used responsibly and strategically to support seniors and their families.
                    </p>
                </div>
            </div>

        </div>
    </section>


        <!-- ============================================
            WAYS TO GIVE SECTION
            ============================================ -->

  <section class="py-5 py-lg-6 bg-white">
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8 text-center">
                <h2 class="fw-bold display-5 mb-3">
                    Ways to <span class="text-purple">Give</span>
                </h2>
                <p class="fs-5 card-text-dark text-secondary mb-0">
                    Choose the giving option that works best for you.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-5 card-spacing-wrapper">
                <div class="card h-100 shadow-sm rounded-4 p-4 give-card-custom hover-shadow">
                    <div class="text-center mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-purple text-white" style="width: 60px; height: 60px;">
                            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3-1.05 0-1.96.54-2.5 1.35l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm11 15H4v-2h16v2zm0-5H4V8h5.08L7 10.83 8.62 12 11 8.76l1-1.36 1 1.36L15.38 12 17 10.83 14.92 8H20v6z"/>
                            </svg>
                        </span>
                    </div>
                    <h4 class="h5 fw-bold text-center mb-2">One-Time Donation</h4>
                    <p class="card-text card-text-dark text-secondary text-center small mb-0">
                        Make an immediate impact for a senior and their family today.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 card-spacing-wrapper">
                <div class="card h-100 shadow-sm rounded-4 p-4 give-card-custom hover-shadow">
                    <div class="text-center mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-purple text-white" style="width: 60px; height: 60px;">
                            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM9 10H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2z"/>
                            </svg>
                        </span>
                    </div>
                    <h4 class="h5 fw-bold text-center mb-2">Monthly Giving</h4>
                    <p class="card-text card-text-dark text-secondary text-center small mb-0">
                       Become a sustaining partner. Recurring donations allow us to continue providing guidance and placement services consistently and confidently.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 card-spacing-wrapper">
                <div class="card h-100 shadow-sm rounded-4 p-4 give-card-custom hover-shadow">
                    <div class="text-center mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-purple text-white" style="width: 60px; height: 60px;">
                            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path d="M12 2l-9 9h18l-9-9zm0 2.8l6.2 6.2H5.8L12 4.8zM19 13v7H5v-7h14zm-7 2H7v3h5v-3z"/>
                            </svg>
                        </span>
                    </div>
                    <h4 class="h5 fw-bold text-center mb-2">Major Gifts</h4>
                    <p class="card-text card-text-dark text-secondary text-center small mb-0">
                       Interested in sponsoring community education initiatives or expanding placement services? Contact us directly to discuss partnership opportunities.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 card-spacing-wrapper">
                <div class="card h-100 shadow-sm rounded-4 p-4 give-card-custom hover-shadow">
                    <div class="text-center mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-purple text-white" style="width: 60px; height: 60px;">
                            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path d="M16.5 13c-1.2 0-3.07.34-4.5 1-1.43-.67-3.3-1-4.5-1C5.38 13 2 14.5 2 16.5V19h20v-2.5c0-2-3.38-3.5-5.5-3.5zM12.5 17.5h-1v-1h1v1zm0-2.5c-1.67 0-5.5-1.17-5.5-3.5 0-1.5 1.67-2.5 3.5-2.5 1.33 0 2.5.67 3.5 1.67 1-1 2.17-1.67 3.5-1.67 1.83 0 3.5 1 3.5 2.5 0 2.33-3.83 3.5-5.5 3.5z"/>
                            </svg>
                        </span>
                    </div>
                    <h4 class="h5 fw-bold text-center mb-2">Corporate Partnerships</h4>
                    <p class="card-text card-text-dark text-secondary text-center small mb-0">

Organizations and businesses can collaborate with Senior Support Solutions through sponsorships, events, or matching gift programs.

                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


        <!-- ============================================
         WHERE YOUR MONEY GOES SECTION
         ============================================ -->
   <section class="py-5 py-lg-6 bg-white">
    <div class="container">
        <div class="transparency-section shadow-sm">
            <div class="row align-items-center">

                <div class="col-lg-5 mb-5 mb-lg-0">
                    <h2 class="fw-bold display-6 mb-4">
                        Where Your <span class="text-purple">Money Goes</span>
                    </h2>
                    <p class="fs-5 text-secondary mb-4">
                        We are committed to financial transparency. Your donations are directly allocated toward making a real difference in the lives of seniors.
                    </p>

                    <div class="stewardship-note mt-5">
                        <p class="mb-0">
                            "We believe in responsible stewardship and measurable impact."
                        </p>
                    </div>
                </div>

               <div class="col-lg-7">
    <div class="ps-lg-5">

        <div class="benefit-item shadow-sm">
            <div class="benefit-icon">
                <i class="fas fa-hand-holding-heart"></i>
            </div>
            <div class="benefit-content">
                <h5 class="fw-bold mb-1 text-dark">Senior Placement</h5>
                <p class="mb-0 text-secondary small">Consultations and coordination for the right care settings.</p>
            </div>
        </div>

        <div class="benefit-item shadow-sm">
            <div class="benefit-icon">
                <i class="fas fa-users-cog"></i>
            </div>
            <div class="benefit-content">
                <h5 class="fw-bold mb-1 text-dark">Family Guidance</h5>
                <p class="mb-0 text-secondary small">Comprehensive support services for families in transition.</p>
            </div>
        </div>

        <div class="benefit-item shadow-sm">
            <div class="benefit-icon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <div class="benefit-content">
                <h5 class="fw-bold mb-1 text-dark">Community Outreach</h5>
                <p class="mb-0 text-secondary small">Education and awareness initiatives for senior care.</p>
            </div>
        </div>

        <div class="benefit-item shadow-sm">
            <div class="benefit-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="benefit-content">
                <h5 class="fw-bold mb-1 text-dark">Operational Support</h5>
                <p class="mb-0 text-secondary small">Ensuring long-term sustainability and reliable service.</p>
            </div>
        </div>

    </div>
</div>
            </div>
        </div>
    </div>
</section>


<section class="py-5 py-lg-6 bg-white">
    <div class="container">

        <div class="row justify-content-center mb-5 g-4 gy-4 text-center">
            <div class="col-lg-8">
                <h2 class="fw-bold display-5 mb-3">
                    Donor <span class="text-purple">Recognition</span>
                </h2>
                <p class="fs-5 text-secondary">
                    We deeply value every contribution. Every donor has the power to choose how they wish to be acknowledged.
                </p>
            </div>
        </div>

      <div class="row g-4 justify-content-center">



          <div class="col-12 col-md-4">
                <div class="recognition-card text-center">
                    <div class="recognition-icon-circle">
                        <i class="fas fa-user-secret"></i>
                    </div>
                    <h4 class="fw-bold h5 mb-3">Remain Anonymous</h4>
                    <p class="text-secondary small mb-0">
                        Prefer to keep your impact private? We fully respect your choice to stay anonymous.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="recognition-card text-center">
                    <div class="recognition-icon-circle">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4 class="fw-bold h5 mb-3">Public Recognition</h4>
                    <p class="text-secondary small mb-0">
                        Be featured on our website as a proud supporter of our mission and vision.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="recognition-card text-center">
                    <div class="recognition-icon-circle">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h4 class="fw-bold h5 mb-3">Impact Updates</h4>
                    <p class="text-secondary small mb-0">
                        Receive regular updates on how your generosity is transforming the lives of seniors.
                    </p>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 text-center">
                <div class="partnership-footer-text">
                    <p class="fs-5 fw-medium text-dark mb-0">
                        <i class="fas fa-handshake text-purple me-2"></i>
                        Our donors are <span class="text-purple fw-bold">true partners</span> in helping seniors find safe and appropriate care environments.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>



  <section id="donate-form" class="py-5 py-lg-6 donation-form-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-8 text-center">
                    <h2 class="fw-bold display-5 mb-3">Make Your <span class="text-purple">Gift</span> Today</h2>
                    <p class="text-muted fs-5">Your generosity today helps a senior find the right place to call home tomorrow.</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-6">
                    <div class="donate-form-card">

                        <form action="#" method="POST">
                            @csrf

                            <!-- Name/Organization -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Name / Organization
                                </label>
                                <input type="text" name="name" class="form-input-custom" placeholder="Enter your name or organization" required>
                            </div>

                            <!-- Telephone Number -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Telephone Number
                                </label>
                                <input type="tel" name="phone" class="form-input-custom" placeholder="Enter your phone number" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                    Email Address
                                </label>
                                <input type="email" name="email" class="form-input-custom" placeholder="name@example.com" required>
                            </div>

                            <!-- Desired Amount -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Desired Amount to Donate
                                </label>
                                <div class="amount-wrapper">
                                    <span class="amount-icon">$</span>
                                    <input type="number" name="amount" class="form-input-custom amount-input" placeholder="0.00" min="1" step="0.01" required>
                                </div>
                            </div>

                            <!-- Message/Comment (Optional) -->
                            <div class="form-group-custom">
                                <label>
                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Message / Comment <small class="text-muted">(Optional)</small>
                                </label>
                                <textarea name="message" class="form-input-custom" rows="3" placeholder="Leave a message..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-submit-donate">
                                Donate Now
                                <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </form>
 <div class="text-center mt-5">
                            <p class="small text-muted mb-4 ">
                                <i class="fas fa-shield-check text-success me-1"></i> Secure online donations accepted.
                            </p>

                            <hr class="my-4" style="opacity: 0.1;">

                            <div class="contact-card p-3" style="background: #fcfaff; border-radius: 15px;">
                                <p class="small fw-bold mb-2" style="color: #555;">For questions about donations, partnerships, or planned giving, please contact:</p>
                                <div class="d-flex flex-column gap-1">
                                    <!--<a href="mailto:info@myseniorsupportsolutios.com" class="text-purple text-decoration-none small fw-bold">-->
                                    <!--    <i class="fas fa-envelope me-1"></i> info@myseniorsupportsolutions.com-->
                                    <!--</a>-->
                                    <a href="mailto:seniorsupportsolutions@gmail.com" class="text-purple text-decoration-none small fw-bold">
                                        <i class="fas fa-envelope me-1"></i> seniorsupportsolutions@gmail.com
                                    </a>
                                    <a href="tel:7722629721" class="text-dark text-decoration-none small fw-bold">
                                        <i class="fas fa-phone-alt me-1 text-purple"></i> 772-262-9721
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div> </div>
            </div>
        </div>
    </section>











</div>
@endsection
