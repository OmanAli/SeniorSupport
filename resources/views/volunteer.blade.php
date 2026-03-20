@extends('frontend.layouts.app')

@section('title', 'Volunteer')

@section('content')
<div class="home-header-section sub-header-section">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('frontend.layouts.topbar')
    @include('frontend.layouts.bar')

    <style>
        
        .volunteer-hero-section {
            background: url('/assets/images/VolunteerWhyUsHero.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            min-height: 80vh;
        }
        
        .volunteer-hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(0,0,0,0.7), rgba(0,0,0,0.3));
            z-index: 1;
        }

        /* Purple theme color utility */
        .text-purple { color: #bb8ee0 !important; }
        .bg-purple { background-color: #bb8ee0 !important; }
        .border-purple { border-color: #bb8ee0 !important; }
        
        .btn-purple {
            background-color: #bb8ee0;
            border-color: #bb8ee0;
            color: #fff;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        
        .btn-purple:hover {
            background-color: #fff;
            color: #bb8ee0;
            border-color: #fff;
            transform: scale(1.05);
        }

        .role-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(187, 142, 224, 0.15);
            border-color: #bb8ee0 !important;
        }

        .role-icon {
            transition: all 0.4s ease;
        }
        
        .role-card:hover .role-icon {
            transform: rotateY(180deg);
        }
  .why-image-wrapper {
        position: relative;
        width: 100%;
        max-width: 450px;          
        margin: 0 auto;             
        border-radius: 24px;
        overflow: hidden;
        aspect-ratio: 3/4;         
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
    }

    .why-image {
        width: 100%;
        height: 100%;
        object-fit: cover;          
        object-position: center;   
         transition: transform 0.6s ease;
    }

        
        .why-image-wrapper:hover .why-image {
            transform: scale(1.05);
        }

      
   .stats-card {
        position: absolute;
        bottom: 20px;              
        left: 50%;
        transform: translateX(-50%);
        background: white;
        padding: 15px 30px;        
        border-radius: 50px;       
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        z-index: 100;               
        min-width: 200px;          
        max-width: 90%;
        border: 2px solid #fff;     /* White border */
    }

    .stats-number {
        font-size: 2rem;          
        font-weight: 800;
        color: #bb8ee0;
        line-height: 1;
        flex-shrink: 0;
        display: block;            
    }

    .stats-text {
        font-size: 0.95rem;
        color: #636e72;
        line-height: 1.3;
        font-weight: 500;
        white-space: nowrap;       
        display: block;            
    }


       
 .benefit-item {
    display: flex !important;
    align-items: flex-start !important;
    gap: 20px !important;  
    margin-bottom: 25px;  
}

.benefits-wrapper {
    padding-left: 10px;  
}

.benefit-icon-wrapper {
    flex-shrink: 0 !important;
    width: 35px !important;  
    height: 35px !important;
    margin-left: 5px;         
}

    .benefit-icon {
  
        flex-shrink: 0 !important;
        width: 32px !important;
        height: 32px !important;
    }

    
.benefit-content {
    flex: 1 !important;
    padding-top: 2px;         
}

 #apply {
        background-color: #ffffff !important;  
        position: relative;                    
        z-index: 10;                           
    }

     /* Form Section Styling */
    .volunteer-form-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        position: relative;
        z-index: 5;
    }

    .volunteer-form-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 200px;
        background: linear-gradient(to bottom, rgba(187, 142, 224, 0.05), transparent);
        pointer-events: none;
    }

    /* Form Card */
    .volunteer-form-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(187, 142, 224, 0.1);
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08), 
                    0 8px 25px rgba(187, 142, 224, 0.1);
        padding: 3rem;
        position: relative;
        overflow: hidden;
    }

    .volunteer-form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #bb8ee0, #9b6bc7, #bb8ee0);
        background-size: 200% 100%;
        animation: gradient-shift 3s ease infinite;
    }

    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* Form Groups */
    .form-group-custom {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .form-group-custom label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #2d3436;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-group-custom .input-icon {
        width: 18px;
        height: 18px;
        color: #bb8ee0;
    }

    /* Input Styling */
    .form-input-custom {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #fff;
        color: #2d3436;
    }

    .form-input-custom::placeholder {
        color: #adb5bd;
        font-size: 0.95rem;
    }

    .form-input-custom:focus {
        outline: none;
        border-color: #bb8ee0;
        box-shadow: 0 0 0 4px rgba(187, 142, 224, 0.1);
        transform: translateY(-2px);
    }

    .form-input-custom:hover {
        border-color: #bb8ee0;
    }

    /* Textarea specific */
    textarea.form-input-custom {
        min-height: 120px;
        resize: vertical;
    }

    /* Submit Button */
    .btn-submit-custom {
        width: 100%;
        padding: 16px 32px;
        background: linear-gradient(135deg, #bb8ee0 0%, #9b6bc7 100%);
        color: #fff;
        font-weight: 600;
        font-size: 1.1rem;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 4px 15px rgba(187, 142, 224, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-submit-custom::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    .btn-submit-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(187, 142, 224, 0.5);
    }

    .btn-submit-custom:hover::before {
        left: 100%;
    }

    .btn-submit-custom:active {
        transform: translateY(-1px);
    }

    .btn-icon {
        width: 20px;
        height: 20px;
        transition: transform 0.3s ease;
    }

    .btn-submit-custom:hover .btn-icon {
        transform: translateX(5px);
    }


    #testimonialCarousel .carousel-item {
    transition: opacity 0.6s ease-in-out;
}

#testimonialCarousel .carousel-fade .carousel-item {
    opacity: 0;
    transition-duration: 0.6s;
    transition-property: opacity;
}

#testimonialCarousel .carousel-fade .carousel-item.active {
    opacity: 1;
}

  

    /* Testimonial Carousel */
    #testimonialCarousel .carousel-item {
        transition: opacity 0.6s ease-in-out;
    }

    #testimonialCarousel .carousel-fade .carousel-item {
        opacity: 0;
        transition-duration: 0.6s;
        transition-property: opacity;
    }

    #testimonialCarousel .carousel-fade .carousel-item.active {
        opacity: 1;
    }

/* Mobile specific */
@media (max-width: 768px) {

      /* Heading center */
        .why-volunteer-section h2 {
            text-align: center !important;
            font-size: 1.8rem;          
            line-height: 1.3;
        }

          /* Paragraph proper align */
        .why-volunteer-section > .container > .row > .col-12 > p,
        .why-volunteer-section .col-12.col-lg-6 > p {
            text-align: justify;     
            text-align-last: left;     
            font-size: 1rem;
            line-height: 1.7;          
            word-wrap: break-word;      
            hyphens: auto;             
            padding: 0 5px;             
        }


   
        .benefits-wrapper {
            padding-left: 0;
            padding-right: 0;
        }
    
        .benefit-item {
            gap: 15px !important;
        }

         .benefit-content p {
            text-align: left;           
            line-height: 1.6;
        }


    .benefit-icon-wrapper {
        margin-left: 0;       
    }
}

    
 @media (max-width: 768px) {
        .why-image-wrapper {
            max-width: 360px;
            aspect-ratio: 3/4;
        }
        
        .stats-card {
            bottom: 15px;          
            left: 50%;
            transform: translateX(-50%);
            padding: 12px 20px;
            gap: 10px;
            min-width: 180px;
        }
        
        .stats-number {
            font-size: 1.6rem;
        }
        
        .stats-text {
            font-size: 0.85rem;
        }
    }

  
    @media (min-width: 992px) {
        .why-visual-container {
            display: flex;
            justify-content: center; 
            padding-left: 40px;      
        }
    }
    

  

        
        @media (max-width: 768px) {
            .volunteer-hero-section { background-attachment: scroll; }
        }
    </style>

<!-- HERO SECTION -->
<section class="volunteer-hero-section position-relative d-flex align-items-center justify-content-center py-5 py-lg-6 px-3">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-center text-white">
                <h1 class="display-4 display-md-3 fw-bold mb-4">
                    {{ $hero->hero_heading ?? 'Volunteer With Us' }}
                </h1>
                <p class="lead fs-4 mb-3">
                    {{ $hero->hero_subtitle ?? 'Make a meaningful difference in the lives of seniors and their families.' }}
                </p>
                <p class="mb-4 opacity-75">
                    {{ $hero->hero_paragraph ?? 'Your time, compassion, and skills can truly change lives. Join our family today.' }}
                </p>
                <a href="#apply" class="btn btn-purple btn-lg rounded-pill px-5 py-3 d-inline-flex align-items-center gap-2 text-decoration-none">
                    Become a Volunteer
                    <svg width="20" height="20 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- VOLUNTEER ROLES SECTION -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8 text-center">
                <h2 class="fw-bold display-5 mb-3">How You Can <span class="text-purple">Help</span></h2>
                <p class="text-muted fs-5">Discover meaningful ways to contribute your time and talents.</p>
            </div>
        </div>
        
        <div class="row g-4">
            @forelse($roles as $role)
            <!-- Dynamic Card -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-1 rounded-4 p-4 text-center role-card">
                    <div class="role-icon display-5 text-purple mb-3">
                        <i class="{{ $role->role_icon }}"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3" style="min-height: 3rem; display: flex; align-items: center; justify-content: center;">
                        {{ $role->role_title }}
                    </h3>
                    <p class="text-muted mb-0">{{ $role->role_description }}</p>
                </div>
            </div>
            @empty
            <!-- Default Cards (Agar database mein data nahi ho) -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-1 rounded-4 p-4 text-center role-card">
                    <div class="role-icon display-5 text-purple mb-3">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3" style="min-height: 3rem; display: flex; align-items: center; justify-content: center;">Senior Companion</h3>
                    <p class="text-muted mb-0">Provide emotional support and friendly visits to brighten a senior's day.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-1 rounded-4 p-4 text-center role-card">
                    <div class="role-icon display-5 text-purple mb-3">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3" style="min-height: 3rem; display: flex; align-items: center; justify-content: center;">Family Support</h3>
                    <p class="text-muted mb-0">Help families navigate senior care options and essential resources.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-1 rounded-4 p-4 text-center role-card">
                    <div class="role-icon display-5 text-purple mb-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3" style="min-height: 3rem; display: flex; align-items: center; justify-content: center;">Community Outreach</h3>
                    <p class="text-muted mb-0">Support awareness campaigns and community education initiatives.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-1 rounded-4 p-4 text-center role-card">
                    <div class="role-icon display-5 text-purple mb-3">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3" style="min-height: 3rem; display: flex; align-items: center; justify-content: center;">Administrative</h3>
                    <p class="text-muted mb-0">Assist with scheduling and documentation to keep our mission running.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- WHY VOLUNTEER SECTION -->
<section class="py-5 py-lg-6 bg-white why-volunteer-section" aria-label="Why volunteer with us">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Content Column -->
            <div class="col-12 col-lg-6">
                <!-- Center on mobile -->
               <h2 class="fw-bold display-5 mb-4 text-center text-lg-start">
    @if($mainData && $mainData->main_heading)
        {!! $mainData->main_heading !!}
    @else
        Why Volunteer With <span class="text-purple">Us</span>?
    @endif
</h2>
                <p class="text-muted fs-5 mb-5 lh-lg why-intro-text">
                    {{ $mainData->main_paragraph ?? 'Joining our team means becoming part of a family dedicated to dignity and care. We ensure your experience is as rewarding for you as it is for the seniors we serve.' }}
                </p>
                
                <!-- Benefits Wrapper -->
                <div class="benefits-wrapper">
                    @if($benefits->count() > 0)
                        <!-- Dynamic Benefits from DB -->
                        @foreach($benefits as $benefit)
                        <div class="benefit-item">
                            <div class="benefit-icon-wrapper">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center w-100 h-100">
                                    <svg width="18" height="18" fill="none" stroke="white" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="benefit-content">
                                <h4 class="h5 fw-bold mb-2">{{ $benefit->benefit_title }}</h4>
                                <p class="text-muted mb-0">{{ $benefit->benefit_description }}</p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Default Benefits (DB mein data nahi ho toh) -->
                        <div class="benefit-item">
                            <div class="benefit-icon-wrapper">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center w-100 h-100">
                                    <svg width="18" height="18" fill="none" stroke="white" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="benefit-content">
                                <h4 class="h5 fw-bold mb-2">Flexible Schedules</h4>
                                <p class="text-muted mb-0">We work around your availability to make volunteering accessible.</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon-wrapper">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center w-100 h-100">
                                    <svg width="18" height="18" fill="none" stroke="white" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="benefit-content">
                                <h4 class="h5 fw-bold mb-2">Training & Guidance</h4>
                                <p class="text-muted mb-0">Receive comprehensive training and ongoing support from our staff.</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon-wrapper">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center w-100 h-100">
                                    <svg width="18" height="18" fill="none" stroke="white" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="benefit-content">
                                <h4 class="h5 fw-bold mb-2">Community Hours</h4>
                                <p class="text-muted mb-0">Official recognition for students and professionals needing hours.</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon-wrapper">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center w-100 h-100">
                                    <svg width="18" height="18" fill="none" stroke="white" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="benefit-content">
                                <h4 class="h5 fw-bold mb-2">Personal Growth</h4>
                                <p class="text-muted mb-0">Develop empathy, communication skills, and professional experience.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

          <!-- Image Column -->
<div class="col-12 col-lg-6">
    <div class="why-visual-container">
        <div class="why-image-wrapper">
            <img src="{{ $imageData ? asset('assets/images/volunteer/whyUs/' . $imageData->image) : '/assets/images/VolunteerWhyUs.jpg' }}" 
                 alt="Volunteers" 
                 class="why-image">

                        <!-- Stats Card -->
                        <div class="stats-card">
                            <span class="stats-number">{{ $mainData->stats_number ?? '500+' }}</span>
                            <span class="stats-text">{{ $mainData->stats_text ?? 'Lives impacted this year' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- VOLUNTEER FORM SECTION -->
<section id="apply" class="py-5 py-lg-6 volunteer-form-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8 text-center">
                <h2 class="fw-bold display-5 mb-3">Ready to Make an <span class="text-purple">Impact</span>?</h2>
                <p class="text-muted fs-5">Fill out the form below and our team will get back to you within 24 hours.</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-6">
                <div class="volunteer-form-card">
                    
                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                    <form action="{{ route('volunteer.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-4">
                            <!-- Full Name -->
                            <div class="col-12 col-md-6">
                                <div class="form-group-custom">
                                    <label>
                                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Full Name
                                    </label>
                                    <input type="text" name="full_name" class="form-input-custom @error('full_name') is-invalid @enderror" placeholder="e.g. John Doe" value="{{ old('full_name') }}" required>
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-12 col-md-6">
                                <div class="form-group-custom">
                                    <label>
                                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                        </svg>
                                        Email Address
                                    </label>
                                    <input type="email" name="email" class="form-input-custom @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-12">
                                <div class="form-group-custom">
                                    <label>
                                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        Phone Number
                                    </label>
                                    <input type="tel" name="phone" class="form-input-custom @error('phone') is-invalid @enderror" placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="col-12">
                                <div class="form-group-custom">
                                    <label>
                                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Why do you want to volunteer? (Optional)
                                    </label>
                                    <textarea name="message" class="form-input-custom" rows="4" placeholder="Tell us a little about yourself and why you're interested in volunteering...">{{ old('message') }}</textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn-submit-custom">
                                    Submit Volunteer Application
                                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TESTIMONIALS SECTION - AUTO SLIDE  -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8 text-center">
                <h2 class="fw-bold display-5 mb-3">
                    {{ $testimonialHeading->heading ?? 'Volunteer' }} <span class="text-purple">Stories</span>
                </h2>
                <p class="text-muted fs-5">
                    {{ $testimonialHeading->subheading ?? 'Hear from those who\'ve made a difference in our community.' }}
                </p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-6">
                
                @if($testimonials->count() > 0)
                <!-- Bootstrap Carousel - Auto Slide Only -->
                <div id="testimonialCarousel" class="carousel slide carousel-fade" 
                     data-bs-ride="carousel" 
                     data-bs-interval="5000"
                     data-bs-pause="false"
                     data-bs-wrap="true">
                    
                    <!-- Slides -->
                    <div class="carousel-inner">
                        @foreach($testimonials as $index => $testimonial)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-light text-center">
                                <div class="text-purple opacity-25 mb-4" style="width: 60px; height: 60px; margin: 0 auto;">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                    </svg>
                                </div>
                                <p class="fst-italic fs-5 text-muted mb-4">"{{ $testimonial->quote }}"</p>
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <div class="text-start">
                                        <h5 class="mb-0 fw-bold text-dark">{{ $testimonial->author_name }}</h5>
                                        <small class="text-muted">{{ $testimonial->author_role }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                
                @else
                <!-- Default Single Testimonial -->
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-light text-center">
                    <div class="text-purple opacity-25 mb-4" style="width: 60px; height: 60px; margin: 0 auto;">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                    </div>
                    <p class="fst-italic fs-5 text-muted mb-4">"Volunteering with Senior Support Solutions has been one of the most rewarding experiences of my life."</p>
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <div class="text-start">
                            <h5 class="mb-0 fw-bold text-dark">Sarah Mitchell</h5>
                            <small class="text-muted">Senior Companion Volunteer</small>
                        </div>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</section>


</div>

@endsection

