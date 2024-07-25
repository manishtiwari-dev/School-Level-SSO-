
@php

   $browchure= getSetting('sso_brochure');

@endphp




<div class="social-media">
    <ul>
        <li>
            <a href="{{ getSetting('facebook_link') }}" target="_blank" style="background: rgba(61, 90, 152, 0.8);">
                <img src="{{ asset('frontend/assets/images/devicon_facebook.png') }}" class="img-fluid" alt="Facebook" />
            </a>
        </li>
        <li>
            <a href="{{ getSetting('instagram_link') }}" target="_blank"   style="background: rgba(211, 85, 139, 0.7);">
                <img src="{{ asset('frontend/assets/images/skill-icons_instagram.png') }}" class="img-fluid" alt="Instagram" />
            </a>
        </li>
        <li>
            <a href="https://api.whatsapp.com/send/?phone=%2B918800549957&text&type=phone_number&app_absent=0" target="_blank" style="background: rgba(96, 214, 105, 0.8);">
                <img src="{{ asset('frontend/assets/images/logos_whatsapp-icon.png') }}" class="img-fluid" alt="Whatsapp" />
            </a>
        </li>
        <li>
            <a href="{{ getSetting('youtube_link') }}" target="_blank"   style="background: rgba(219, 100, 100, 0.8);">
                <img src="{{ asset('frontend/assets/images/logos_youtube-icon.png') }}" class="img-fluid" alt="Youtube" />
            </a>
        </li>
    </ul>
</div>


<header class="header-wrapper">
    <div class="header-inner">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-md navbar-dark">
                       

                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img src="{{ uploadedAsset(getSetting('website_logo')) }}"
                                onerror="this.onerror=null;this.src='{{ asset('backend/assets/img/placeholder-thumb.png') }}';"
                                alt="{{ getSetting('system_title') }}">
                        </a>



                        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                              

                                <li class="nav-item dropdown active">
                                    <a class="nav-link active dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown">Register</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('register.individual_register') }}">Register As Individual
                                            </a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('register.institute') }}">
                                            Register As School
                                        </a></li>
                                     
                                        
                                    </ul>
                                </li>



                                <li class="nav-item">
                                 
                                    <a   class="nav-link" download="testPdf" href="{{ asset('storage/'.$browchure) }}" >Download Brochure</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.syllabus')}}">Syllabus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register.coordinator') }}">Become Coordinator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.scholarship') }}">Scholarships</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" class="btn-basic-style btnSports"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                            viewBox="0 0 23 20" fill="none">
                                            <path
                                                d="M8.69919 10.7147C8.57131 8.79035 9.42755 7.34697 9.78672 6.80988C10.1642 6.12266 10.6635 5.02123 10.8876 3.5823C11.1256 2.05386 10.9538 0.786183 10.7853 0C10.147 3.33933 8.58076 5.7557 7.14239 6.63251C5.96645 7.3492 4.76939 7.52267 4.76939 7.52267C4.10997 7.6183 3.55342 7.58327 3.17422 7.53435C3.6952 9.1979 5.21252 12.9765 9.02445 14.9603C10.2087 15.5769 11.358 15.886 12.331 16.0395C12.1025 15.9183 8.92882 14.1619 8.69919 10.7147Z"
                                                fill="#0096B9" />
                                            <path
                                                d="M5.71969 6.85424C6.69721 6.6956 7.36105 5.77455 7.2024 4.79702C7.04376 3.8195 6.12271 3.15566 5.14518 3.31431C4.16765 3.47295 3.50382 4.394 3.66247 5.37153C3.82111 6.34905 4.74216 7.01289 5.71969 6.85424Z"
                                                fill="#5DC7D6" />
                                            <path
                                                d="M13.0487 14.696C13.052 13.0591 12.2475 11.8832 11.9145 11.4478C11.5569 10.8868 11.0743 9.98054 10.8058 8.77458C10.5206 7.493 10.5967 6.40936 10.6968 5.73438C11.4202 8.52772 12.8786 10.4893 14.1451 11.1531C15.1804 11.6958 16.2034 11.7775 16.2034 11.7775C16.7672 11.822 17.237 11.7625 17.5551 11.7002C17.2048 13.1381 16.1262 16.4212 13.0059 18.31C12.0362 18.8971 11.0799 19.2218 10.2643 19.4047C10.4505 19.2896 13.0426 17.6289 13.0487 14.696Z"
                                                fill="#FBAC1F" />
                                            <path
                                                d="M16.365 8.42318C16.7489 7.39507 16.2266 6.25042 15.1985 5.86653C14.1704 5.48263 13.0257 6.00487 12.6418 7.03298C12.258 8.06109 12.7802 9.20574 13.8083 9.58963C14.8364 9.97353 15.9811 9.45129 16.365 8.42318Z"
                                                fill="#FFC322" />
                                            <path
                                                d="M11.4408 16.5761C10.038 16.2592 7.88184 15.5753 5.70288 13.984C1.89429 11.2018 0.470931 7.44102 0 5.96484C0.0544879 7.00067 0.348612 10.0192 2.66157 12.7047C5.97366 16.5511 10.7274 16.5833 11.4408 16.5761Z"
                                                fill="#006DA6" />
                                            <path
                                                d="M22.4356 3.4375C22.6236 3.60319 22.8121 3.76943 23 3.93512C22.8782 5.67039 22.4495 8.37311 20.9144 11.2421C17.9949 16.6981 13.0982 18.9716 11.4413 19.6549C12.7918 18.9193 14.3025 17.9102 15.7792 16.5185C20.6948 11.8859 22.0203 6.05236 22.4356 3.4375Z"
                                                fill="#F47621" />
                                        </svg>Sports Quiz<svg xmlns="http://www.w3.org/2000/svg" width="15"
                                            height="8" viewBox="0 0 15 8" fill="none">
                                            <path
                                                d="M14.3536 4.35355C14.5488 4.15829 14.5488 3.84171 14.3536 3.64645L11.1716 0.464466C10.9763 0.269204 10.6597 0.269204 10.4645 0.464466C10.2692 0.659728 10.2692 0.976311 10.4645 1.17157L13.2929 4L10.4645 6.82843C10.2692 7.02369 10.2692 7.34027 10.4645 7.53553C10.6597 7.7308 10.9763 7.7308 11.1716 7.53553L14.3536 4.35355ZM0 4.5H14V3.5H0V4.5Z"
                                                fill="white" />
                                        </svg></a>
                                        <span class="skew-bg"></span>
                                </li>
                            </ul>
                        </div>
                    </nav>

                   
                </div>
            </div>
        </div>
        <div class="bottom-header">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-md navbar-dark">
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown">About</a>
                                    <ul class="dropdown-menu">
                                       

                                        @if (!empty($pages_data))
                                        @foreach ($pages_data as $k => $pages)
                                            <li><a href="{{ route('home.pages.show',$pages->slug) }}" class="dropdown-item">{{$pages->title}}</a></li>
                                        @endforeach
                                     @endif
                                       


                                    </ul>
                                </li>
                             
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown">Sports</a>
                                    <ul class="dropdown-menu">
                                        {{-- <li><a class="dropdown-item" href="#">Subjects</a></li> --}}
                                        <li>
                                            <a class="dropdown-item" href="{{ route('home.syllabus')}}">Syllabus</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('home.refer-book')}}">Reference books</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('home.model-paper')}}"> Model question paper</a>
                                        </li>
                                       
                                    </ul>
                                </li>






                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.gallery') }}">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.winner') }}">Winners</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.contactUs') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-nav">
        <nav class="navbar navbar-dark">
          <div class="container-fluid">
            
            <a href="{{ url('/') }}" class="navbar-brand col-md-2">
                <img src="{{ uploadedAsset(getSetting('website_logo')) }}"
                    onerror="this.onerror=null;this.src='{{ asset('backend/assets/img/placeholder-thumb.png') }}';"
                    alt="{{ getSetting('system_title') }}">
            </a>

       
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar"
            aria-label="Toggle navigation"
          >
          <span class="navbar-toggler-icon"></span>
          </button>
            <div
              class="offcanvas offcanvas-end text-bg-dark"
              tabindex="-1"
              id="offcanvasDarkNavbar"
              aria-labelledby="offcanvasDarkNavbarLabel"
            >
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                
                    <img src="images/Logo.png"  alt="unlock Startup">
                </h5>
                <button
                  type="button"
                  class="btn-close btn-close-white"
                  data-bs-dismiss="offcanvas"
                  aria-label="Close"
                ></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item dropdown active">
                        <a class="nav-link active dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">Register</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('register.institute') }}">
                                Register Through School
                            </a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('register.individual_register') }}">Register As Individual
                                </a>
                            </li>
                            
                        </ul>
                    </li>


                        <li class="nav-item">
                           
                            <a   class="nav-link" download="testPdf" href="{{ asset('storage/'.$browchure) }}" >Download Brochure</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.syllabus')}}">
                                Syllabus
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.coordinator') }}">
                                Become Coordinator
                            </a>
                        </li>
                        <li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.scholarship') }}">
                                Scholarships
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Scholarships
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">About</a>
                            <ul class="dropdown-menu">
                            
                              @if (!empty($pages_data))
                              @foreach ($pages_data as $k => $pages)
                                  <li><a href="{{ route('home.pages.show',$pages->slug) }}" class="dropdown-item">{{$pages->title}}</a></li>
                              @endforeach
                           @endif

                            </ul>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Sports</a>
                            <ul class="dropdown-menu">
                                {{-- <li><a class="dropdown-item" href="#">Subjects</a></li> --}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('home.syllabus')}}">Syllabus</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('home.refer-book')}}">Reference books</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('home.model-paper')}}"> Model question paper</a>
                                </li>                          
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.gallery') }}">
                                Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.winner') }}">
                                Winners
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.contactUs') }}">
                                Contact
                            </a>
                        </li>
                </ul>
              </div>
             
            </div>
          </div>
        </nav>
      </div>
</header>
