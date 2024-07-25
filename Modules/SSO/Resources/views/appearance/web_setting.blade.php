<x-backend.app-layout>

    @section('title')
        {{ localize('Web Setting') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection
    
    
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Web Setting') }}</h2>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.websettings.update') }}" method="POST" enctype="multipart/form-data"
                        class="pb-650">
                        @csrf
    
                        <!--Topbar-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Basic Information') }}</h5>
    
                              
    
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ localize('Admin Email') }}</label>
                                    <input type="hidden" name="types[]" value="sso_email">
                                    <input type="email" name="sso_email" id="sso_email" class="form-control"
                                        placeholder="{{ localize('grostore@support.com') }}"
                                        value="{{ getSetting('sso_email') }}">
                                </div>

                                
                                <div class="mb-3">
                                    <label for="contact_us_number"
                                        class="form-label">{{ localize('Contact Number') }}</label>
                                    <input type="hidden" name="types[]" value="contact_us_number">
                                    <input type="text" name="contact_us_number" id="contact_us_number"
                                        class="form-control" placeholder="+80 157 058 4567"
                                        value="{{ getSetting('contact_us_number') }}">
                                </div>
    

                                <div class="mb-3">
                                    <label for="sso_whtasapp_no"
                                        class="form-label">{{ localize('Whatsapp Number') }}</label>
                                    <input type="hidden" name="types[]" value="sso_whtasapp_no">
                                    <input type="text" name="sso_whtasapp_no" id="sso_whtasapp_no"
                                        class="form-control" placeholder="+80 157 058 4567"
                                        value="{{ getSetting('sso_whtasapp_no') }}">
                                </div>



                                <div class="mb-3">
                                    <label for="location"
                                        class="form-label">{{ localize('Address') }}</label>
                                    <input type="hidden" name="types[]" value="sso_address">
                                    <input type="text" name="sso_address" id="sso_address" class="form-control"
                                        placeholder="{{ localize('Washington, New York, USA - 254230') }}"
                                        value="{{ getSetting('sso_address') }}">
                                </div>
    
                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">{{ localize('Facebook Link') }}</label>
                                    <input type="hidden" name="types[]" value="facebook_link">
                                    <input type="url" name="facebook_link" id="facebook_link" class="form-control"
                                        placeholder="https://facebook.com/example"
                                        value="{{ getSetting('facebook_link') }}">
                                </div>
    
                                <div class="mb-3">
                                    <label for="instagram_link" class="form-label">{{ localize('Instagram Link') }}</label>
                                    <input type="hidden" name="types[]" value="instagram_link">
                                    <input type="url" name="instagram_link" id="instagram_link" class="form-control"
                                        placeholder="https://facebook.com/example"
                                        value="{{ getSetting('instagram_link') }}">
                                </div>
    
    
                                <div class="mb-3">
                                    <label for="twitter_link" class="form-label">{{ localize('Twitter Link') }}</label>
                                    <input type="hidden" name="types[]" value="twitter_link">
                                    <input type="url" name="twitter_link" id="twitter_link" class="form-control"
                                        placeholder="https://twitter.com/example" value="{{ getSetting('twitter_link') }}">
                                </div>
    
                                <div class="mb-3">
                                    <label for="linkedin_link" class="form-label">{{ localize('LinkedIn Link') }}</label>
                                    <input type="hidden" name="types[]" value="linkedin_link">
                                    <input type="url" name="linkedin_link" id="linkedin_link" class="form-control"
                                        placeholder="https://linkedin.com/example"
                                        value="{{ getSetting('linkedin_link') }}">
                                </div>
    
                                <div class="mb-3">
                                    <label for="youtube_link" class="form-label">{{ localize('Youtube Link') }}</label>
                                    <input type="hidden" name="types[]" value="youtube_link">
                                    <input type="url" name="youtube_link" id="youtube_link" class="form-control"
                                        placeholder="https://youtube.com/example"
                                        value="{{ getSetting('youtube_link') }}">
                                </div>
    

                                <div class="mb-3">
                                    <label for="sso_aboutUs"
                                        class="form-label">{{ localize('About us') }}</label>
                                    <input type="hidden" name="types[]" value="sso_aboutUs">
                                    <textarea name="sso_aboutUs" class="form-control">{{ getSetting('sso_aboutUs') }}</textarea>
                                   
                                </div>
    
                            </div>
                        </div>
    
    
                        <!--Navbar-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Website Information') }}</h5>
    
                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Website Logo') }}</label>
                                    <input type="hidden" name="types[]" value="website_logo">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Website Logo') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="website_logo"
                                                    value="{{ getSetting('website_logo') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="favicon" class="form-label">{{ localize('Favicon') }}</label>
                                    <input type="hidden" name="types[]" value="sso_favicon">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Favicon') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="sso_favicon" value="{{ getSetting('sso_favicon') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>

                                {{-- <div class="mb-3">
                                    <label class="form-label">Brochure</label>
                                    <input type="hidden" name="types[]" value="sso_brochure">

                                    <input type="file" name="sso_brochure" placeholder="Pdf" class="form-control"   value="{{ getSetting('sso_brochure') }}">
    
                                </div> --}}
                            </div>
                        </div>
    
    
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> {{ localize('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
    
                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar d-none d-xl-block">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Header Configuration') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">{{ localize('Basic Information') }}</a>
                                    </li>
                                    <li>
                                        <a href="#section-2">{{ localize('Website Information') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    @push('scripts')
        <script>
            "use strict";
    
            // runs when the document is ready --> for media files
            $(document).ready(function() {
                getChosenFilesCount();
                showSelectedFilePreviewOnLoad();
            });
        </script>
    @endpush
    
    </x-backend.app-layout>