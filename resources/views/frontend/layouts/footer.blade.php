 <!-- Footer -->
 <div class="footer-section position-relative">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 col-md-4 col-sm-12">
                 <figure class="sencare-logo-footer">
                     <a class="navbar-brand mr-0" href="{{ url('home') }}"><img
                             src="{{ asset('assets/images/logo.webp') }}" alt="" class="img-fluid" width="179"
                             height="58" style="border-radius: 12px"></a>
                 </figure>
                 <p class="footer-text">Copyright © {{ date('Y') }} Senior Support. All Rights Reserved. <br>
                <span style="color: black;"><b>A Registered 501(c)(3) nonprofit organization</b></span></p>
                 <div class="social-icons text-center">
                     <ul class="list-unstyled">
                         <li><a href="#" class="text-decoration-none"><i
                                     class="fa-brands fa-twitter social-networks"></i></a></li>
                         <li><a href="#" class="text-decoration-none"><i
                                     class="fa-brands fa-facebook-f social-networks"></i></a></li>
                         <li><a href="#" class="text-decoration-none"><i
                                     class="fa-brands fa-pinterest-p social-networks"></i></a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-lg-block d-none">
                 <ul class="list-unstyled footer-list-ul">
                     <li class="list-item footer-margin-left">
                         <h4 class="footer-link  footer-heading">
                             Useful Links
                         </h4>
                     </li>
                     <li>
                         <a href="{{ route('aboutUs') }}" class="text-decoration-none footer-link-p">
                             About us
                         </a>
                     </li>
                     <li>
                         <a href="" class="text-decoration-none footer-link-p">
                             Donate
                         </a>
                     </li>
                     <li>
                         <a href="#" class="text-decoration-none footer-link-p">
                             Volunteer
                         </a>
                     </li>

                     <li>
                         <a href="{{ route('faq') }}" class="text-decoration-none footer-link-p">
                             FAQ Page
                         </a>
                     </li>
                     <li>
                         <a href="" class="text-decoration-none footer-link-p">
                             Contact us
                         </a>
                     </li>
                 </ul>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-12">
                 <ul class="list-unstyled footer-list-ul contact-info-heading">
                     <li class="list-item footer-margin-left">
                         <h4 class="footer-link footer-heading">
                             Contact Info
                         </h4>
                     </li>
                     <li class="footer-margin-bottom">
                         <a href="about.html" class="text-decoration-none">
                             Address:
                         </a>
                     </li>
                     <li class="pr-2 mb-3">
                         <a class="text-decoration-none">
                             {{ systemConfig('address', 'N/A') }}
                         </a>
                     </li>
                     <li class="footer-margin-bottom">
                         <a class="text-decoration-none">
                             Email:
                         </a>
                     </li>
                     <li class="mb-3">
                         <a href="mailto:{{ systemConfig('email', 'N/A') }}" class="text-decoration-none">
                             {{ systemConfig('email', 'N/A') }}
                         </a>
                     </li>

                     <li class="footer-margin-bottom">
                         <a href="" class="text-decoration-none">
                             Phone:
                         </a>
                     </li>
                     <li>
                         <a href="tel:{{ systemConfig('phoneSecond', 'N/A') }}" class="text-decoration-none">
                             {{ systemConfig('phone', 'N/A') }}

                         </a>
                         <a href="tel:{{ systemConfig('phoneSecond', '') }}" class="text-decoration-none">
                             {{ systemConfig('phoneSecond', '') }}

                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
