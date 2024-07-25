<x-backend.app-layout>

    @section('title')
        {{ localize('Update Testimonial') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection

    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Update Testimonial') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.testimonial.update') }}" method="POST" class="pb-650"
                        id="product-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $testimonialData->id }}">

                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Basic Information') }}</h5>

                                <div class="mb-4">
                                    <label for="type" class="form-label">{{ localize('Name') }}</label>
                                    <input class="form-control" type="text" id=""
                                        placeholder="{{ localize('Type your  name') }}" name="name"
                                        value="{{ $testimonialData->name }}">
                                </div>

                                <div class="mb-4">
                                    <label for="type" class="form-label">{{ localize('Email') }}</label>
                                    <input class="form-control" type="text" id=""
                                        placeholder="{{ localize('Type your  email') }}" name="email"
                                        value="{{ $testimonialData->email }}">
                                </div>

                                <div class="mb-4">
                                    <label for="type" class="form-label">{{ localize('Designation') }}</label>
                                    <input class="form-control" type="text" id=""
                                        placeholder="{{ localize('Type your designation') }}" name="designation"
                                        required value="{{ $testimonialData->designation }}">

                                </div>

                                <div class="mb-4">
                                    <label for="type" class="form-label">{{ localize('Phone') }}</label>
                                    <input class="form-control" type="text" id=""
                                        placeholder="{{ localize('Type your  contact') }}" name="phone"
                                        value="{{ $testimonialData->phone }}">
                                </div>

                                <div class="mb-4">
                                    <label for="class_name" class="form-label">Content</label>
                                    <textarea class="editor" name="comment" required>
                                            {{ $testimonialData->comment }}
                                        </textarea>
                                </div>
                            </div>
                        </div>
                        <!--basic information end-->

                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Images') }}</h5>
                                <div class="mb-4">
                                    <label class="form-label">{{ localize('Thumbnail') }}</label>
                                    <input type="hidden" name="types[]" value="attachment">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose  Thumbnail') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="attachment"
                                                    value="{{ $testimonialData->attachment }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>


                            <div class="mb-4">
                                <label for="class_name" class="form-label">Video</label>
                                <input type="hidden" value="{{ $testimonialData->video_url }}" name="old_video" id="formFile">
                                <input class="form-control" type="file" name="video" id="formFile">
                                </div>

                            </div>
                        </div>

                        {{-- <img src={{ uploadedAsset($galleryData->attachment) }} class="img-fluid" /> --}}

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> {{ localize('Update') }}
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
                            <h5 class="mb-4">{{ localize('Update Testimonial') }}</h5>
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
