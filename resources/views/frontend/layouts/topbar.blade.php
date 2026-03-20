<!-- Top-Header-Section -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 d-md-block d-sm-none">
                <div class="header-left d-table-cell align-middle">
                    <div class="phone-icon d-inline-block"><i class="fa-solid fa-phone-volume"></i></div>
                    <p>For a free consultation:<a href="tel:+{{systemConfig('phone') ?? 'N/A'}}" class="text-decoration-none">{{systemConfig('phone') ?? 'N/A'}}</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-right float-md-right float-none">
                    <ul class="list-unstyled">
                        <li class="d-inline-block"><i class="fa-sharp fa-solid fa-envelope"></i><a
                                class="d-inline-block email-span text-decoration-none"
                                href="mailto:{{ systemConfig('email') ?? 'N/A' }}">{{ systemConfig('email') ?? 'N/A' }}</a></li>
                        @if (!auth()->check())
                            <li class="d-inline-block user-li"><i class="fa-solid fa-user"></i><a
                                    class="d-inline-block user-span text-decoration-none" href="{{ route('login') }}"
                                    target="_blank">Login</a></li>
                        @else
                            <li class="d-inline-block user-li"><i class="fa-solid fa-user"></i><a
                                    class="d-inline-block user-span text-decoration-none" href="{{ route('home') }}"
                                    target="_blank">Admin Panel</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

