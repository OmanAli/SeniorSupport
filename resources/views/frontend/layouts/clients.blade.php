@php
    $userReviews = userReviews();

@endphp

@if ($userReviews->count() > 0)
    <section class="happy-clients-section happy-clients-section2 happy-clients-section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <div class="review-section-outer position-relative">
                            <div class="carousel-card">
                                <div class="carousel-inner">
                                    @foreach ($userReviews as $index => $review)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <figure><img src="{{ asset('assets/images/happy-clients-section-img2.png') }}"alt="Img" class="img-fluid">
                                            </figure>
                                            <h4 class="carousel-text">
                                                {{ $review->review }}
                                            </h4>
                                            <div class="about-border"></div>

                                            <h4 class="carousel-title">
                                                {{ $review->name }}
                                            </h4>

                                            <p class="carousel-end-text">
                                                {{ $review->designation ?? '' }}
                                            </p>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- End slideshow -->

                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>

                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
