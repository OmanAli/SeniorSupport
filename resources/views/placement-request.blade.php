@extends('frontend.layouts.app')
@section('title', 'Placement Request')
@section('content')
    <!-- Top-Header-Section -->
    <div class="home-header-section sub-header-section">
        @include('frontend.layouts.topbar')
        @include('frontend.layouts.bar')

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <!-- BANNER-SECTION -->
    <div class="home-banner-section overflow-hidden home-banner-section2 home-banner-section1 sub-banner placement-request-banner">
        <div class="banner-container-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4 text-md-left text-center d-flex align-items-center">
                        <div class="home-banner-text" data-aos="fade-up">
                            <div class="banner-btn discover-btn-banner">
                                <a class="text-decoration-none about-btn">
                                    Home <span class="next-btn"> > </span>
                                    <span class="about-span">Placement Request</span>
                                </a>
                            </div>
                            <h2>Request For Your Placement</h2>
                            <p class="banner-paragraph about-us-p">
                                {{ $banner->description ?? 'Welcome! Fill out the form below to submit your placement request, and our specialists will contact you shortly.' }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="banner-img-section position-relative">
                            <figure class="banner-img2-figure">
                                <img src="{{ asset('assets/images/faq-banner.png') }}" alt="Placement Request Banner">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="placement-request-section py-5" style="margin: -250px 0 0 0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">

                <div class="form-card">
                    <div class="text-center mb-5">
                        <h2 class="form-title">Submit Your Placement Request</h2>
                        <p class="form-subtitle">Fill out the form below and our care specialists will get back to you shortly.</p>
                    </div>

                    <form action="{{ route('placement.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">

                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" name="full_name" class="form-control custom-input" required placeholder="John Doe">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                    <input type="text" name="phone" class="form-control custom-input" required placeholder="(555) 000-0000">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control custom-input" required placeholder="email@example.com">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Senior's Age</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-calendar-check"></i></span>
                                    <input type="number" name="senior_age" class="form-control custom-input" required placeholder="e.g. 75">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Type of Care Needed</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-heart-pulse"></i></span>
                                    <select name="care_type" class="form-select custom-input" required>
                                        <option value="">Select Care Type</option>
                                        <option value="Assisted Living">Assisted Living</option>
                                        <option value="Memory Care">Memory Care</option>
                                        <option value="Independent Living">Independent Living</option>
                                        <option value="Residential Care Home">Residential Care Home</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Preferred Location</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                    <input type="text" name="location" class="form-control custom-input" required placeholder="City or Zip Code">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Message / Additional Details</label>
                                <textarea name="message" class="form-control custom-input-textarea" rows="4" required placeholder="Tell us more about your needs..."></textarea>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-submit">
                                    Submit Request <i class="fa-solid fa-paper-plane ms-2"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
    /* Section & Container */
    .placement-request-section {
        background-color: #f8f9fa;
        padding: 70px 0;
    }

    .form-card {
        background: #ffffff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.04);
        border: 1px solid #f0f0f0;
    }

    /* Typography */
    .form-title {
        font-family: 'Playfair Display', serif; /* Serif font for elegant look */
        font-weight: 700;
        color: #2d3436;
        font-size: 2.2rem;
        margin-bottom: 10px;
    }

    .form-subtitle {
        color: #636e72;
        font-size: 1.1rem;
    }

    .form-label {
        font-weight: 600;
        color: #2d3436;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    /* Input Group & Icons */
    .input-group-text {
        background-color: #fdfdfd;
        border: 1.5px solid #e2e8f0;
        border-right: none;
        border-radius: 12px 0 0 12px;
        color: #a0aec0;
        padding-left: 20px;
        transition: all 0.3s ease;
    }

    .custom-input {
        border: 1.5px solid #e2e8f0;
        border-left: none;
        border-radius: 0 12px 12px 0;
        padding: 12px 15px;
        font-size: 15px;
        background-color: #fdfdfd;
        transition: all 0.3s ease;
    }

    .custom-input-textarea {
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 15px;
        background-color: #fdfdfd;
    }

    /* Focus States */
    .input-group:focus-within .input-group-text {
        border-color: #b18ccf;
        color: #b18ccf;
    }

    .input-group:focus-within .custom-input,
    .custom-input-textarea:focus {
        border-color: #b18ccf;
        box-shadow: 0 0 0 4px rgba(177, 140, 207, 0.1);
        background-color: #fff;
        outline: none;
    }

    /* Premium Button */
    .btn-submit {
        background-color: #b18ccf;
        color: white;
        padding: 16px 50px;
        font-size: 16px;
        font-weight: 700;
        border-radius: 50px;
        border: none;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 6px 20px rgba(177, 140, 207, 0.3);
    }

    .btn-submit:hover {
        background-color: #9b74bd;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(177, 140, 207, 0.4);
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-card { padding: 30px 20px; }
        .form-title { font-size: 1.8rem; }
    }
</style>




@endsection
