<header class="header">
    <div class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand mr-0" href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}"
                        alt="" class="img-fluid" style="border-radius: 12px;"></a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-toggler-icon2"></span>
                    <span class="navbar-toggler-icon navbar-toggler-icon2"></span>
                    <span class="navbar-toggler-icon navbar-toggler-icon2"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        {{-- <li class="nav-item dropdown sancare-li-color active">
                                            <a class="nav-link dropdown-toggle active text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                                               <div class="dropdown-menu sancare-drop-down">
                                                   <ul class="list-unstyled">
                                                       <li class="nav-item"> <a class="dropdown-item nav-link" href="index-2.html"> Home 01</a></li>
                                                       <li class="nav-item"> <a class="dropdown-item nav-link" href="index2.html">Home 02</a></li>
                                                       <li class="nav-item"> <a class="dropdown-item nav-link active" href="index3.html">Home 03</a></li>
                                                   </ul>
                                                </div>
                                       </li> --}}
                        <li class="nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}">
                            <a class="nav-link text-decoration-none navbar-text-color index2-navlink text-white"
                                href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('aboutUs') ? 'active' : '' }}">
                            <a class="nav-link text-decoration-none navbar-text-color index2-navlink text-white"
                                href="{{ route('aboutUs') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none navbar-text-color index2-navlink text-white"
                                href="{{ route('donate') }}">Donate</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none navbar-text-color index2-navlink text-white"
                                href="{{ route('volunteer') }}">Volunteer</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('faq') ? 'active' : '' }}">
                            <a class="nav-link text-decoration-none navbar-text-color index2-navlink text-white"
                                href="{{ route('faq') }}">FAQ</a>
                        </li>

                        <li class="nav-item list-unstyled  btn-talk nav-btn2"><a class="nav-link contact"
                                href="tel:{{ systemConfig('phone') ?? '' }}">CALL US NOW</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
