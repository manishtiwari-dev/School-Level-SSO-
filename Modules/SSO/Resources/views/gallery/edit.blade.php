<x-backend.app-layout>

@section('title')
    {{ localize('Update Images') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Update Images') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.gallery.update') }}" method="POST" class="pb-650" id="product-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $galleryData->id }}">

                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Basic Information') }}</h5>

                                
                                <div class="mb-4">
                                    <label for="type" class="form-label">{{ localize('Image Type') }}</label>
                                    <select class="form-control select2" name="type" data-toggle="select2" 
                                    required>
                                <option value="">Select Type</option>
                                <option value="1" {{ $galleryData->type == 1 ? 'selected' : '' }}>Award Gallery
                                </option>
                                <option value="2"  {{ $galleryData->type == 2 ? 'selected' : '' }}>Media Coverage</option>
                                <option value="3"  {{ $galleryData->type == 3 ? 'selected' : '' }}>Video Coverage</option>
                                <option value="4"  {{ $galleryData->type == 4 ? 'selected' : '' }}>Student Video</option>

                                </select>
                                  
                                </div>
                               


                                <div class="mb-4">
                                    <label for="type" class="form-label">{{ localize('Image Name') }}</label>
                                    <input class="form-control" type="text" id=""
                                        placeholder="{{ localize('Type your image name') }}" name="name" required  value="{{ $galleryData->name }}">
                                  
                                </div>
                               
                                <div class="mb-4">
                                    <label for="class_name" class="form-label">Content</label>
                                  
                                    <textarea class="form-control" name="content" id="short_description" rows="4"
                                    placeholder="{{ localize('Type your content') }}" required >  {{ $galleryData->content }}</textarea>
                                    </div>
    
                                    
                                

                            </div>
                        </div>
                        <!--basic information end-->

                        {{-- <!--product image and gallery start-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Images') }}</h5>
                            
                                <div class="mb-4">
                                    <label class="form-label">{{ localize('Gallery') }}</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Gallery Images') }}</span>

                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="multiple">
                                                <input type="hidden" name="images"   value="{{ $galleryData->name }}">
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
                        <!-- image and gallery end-->


                       --}}

                       <div class="card mb-4" id="section-2">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Images') }}</h5>
                            <div class="mb-4">
                                <label class="form-label">{{ localize('Image') }}</label>
                                <input type="hidden" name="types[]" value="attachment">
                                <div class="tt-image-drop rounded">
                                    <span class="fw-semibold">{{ localize('Choose  Image') }}</span>
                                    <!-- choose media -->
                                    <div class="tt-product-thumb show-selected-files mt-3">
                                        <div class="avatar avatar-xl cursor-pointer choose-media"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                            onclick="showMediaManager(this)" data-selection="single">
                                            <input type="hidden" name="attachment"
                                                value="{{ $galleryData->attachment }}">
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

                    
                    {{-- <img src={{ uploadedAsset($galleryData->attachment) }} class="img-fluid" /> --}}
                  
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

