<x-backend.app-layout>

@section('title')
    {{ localize('Add Images') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection


    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Add Images') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.gallery.store') }}" method="POST" class="pb-650" id="" enctype="multipart/form-data">
                        @csrf
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Basic Information') }}</h5>

                                <div class="mb-4">
                                    <label for="type" class="form-label">{{ localize('Image Type') }}</label>
                                    <select class="form-control select2" name="type" data-toggle="select2" 
                                    required>
                                <option value="">Select Type</option>
                                <option value="1">Award Gallery
                                </option>
                                <option value="2">Media Coverage</option>
                                <option value="3">Video Coverage</option>
                                <option value="4">Student Video</option>

                                </select>
                                  
                                </div>
                               


                                <div class="mb-4">
                                    <label for="type" class="form-label">{{ localize('Image Name') }}</label>
                                    <input class="form-control" type="text" id=""
                                        placeholder="{{ localize('Type your image name') }}" name="name" required>
                                  
                                </div>
                               
                                <div class="mb-4">
                                    <label for="class_name" class="form-label">Content</label>
                                   
                                    <textarea class="form-control" name="content" id="short_description" rows="4"
                                    placeholder="{{ localize('Type your content') }}" required > </textarea>
                                    </div>
    
                            </div>
                        </div>
                        <!--basic information end-->

                         <div class="card mb-4" id="section-2">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Images') }}</h5>
                            <div class="mb-4">
                                <label class="form-label">Image</label>
                                <div class="tt-image-drop rounded">
                                    <span class="fw-semibold">Image</span>
                                    <!-- choose media -->
                                    <div class="tt-product-thumb show-selected-files mt-3">
                                        <div class="avatar avatar-xl cursor-pointer choose-media"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                            onclick="showMediaManager(this)" data-selection="single">
                                            <input type="hidden" name="attachment">
                                            <div class="no-avatar rounded-circle">
                                                <span><i data-feather="plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- choose media -->
                                </div>
                            </div>
                          
                        </div>
                    </div>
                       
                  
                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> {{ localize('Save Gallery') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- submit button end -->

                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize(' Gallery') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">{{ localize('Basic Information') }}</a>
                                    </li>
                                   
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-backend.app-layout>
@section('scripts')
<script>
    "use strict";
$(document).ready(function() {
    getChosenFilesCount();
    showSelectedFilePreviewOnLoad();
});

let options = $('.themeChange option:selected').val();
</script>
@endsection
