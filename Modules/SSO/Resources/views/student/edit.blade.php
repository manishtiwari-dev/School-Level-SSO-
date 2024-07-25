<x-backend.app-layout>

    @section('title')
        {{ localize('Update Student ') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection

    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card tt-page-header">
                    <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title">
                            <h2 class="h5 mb-lg-0">{{ localize('Update Student') }}</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 g-4">
            <!--left sidebar-->
            <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                <form action="{{ route('admin.student.update') }}" method="POST" class="pb-650" id="product-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $studentlist->id }}">
                    <div class="card mb-4" id="section-1">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="college_name" class="form-label">Institute Name</label>
                                <select class="form-select select2  border border-2" name="institute_id" id="college_name"
                                    required>
                                    <option value="">Select Institute</option>
                                    @if (!empty($collegelist))
                                        @foreach ($collegelist as $college)
                                            <option value="{{ $college->id }}"
                                                {{ $college->id == $studentlist->institute_id ? 'selected' : '' }}>
                                                {{ $college->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="class_name" class="form-label">Class Name</label>
                                <select class="form-select select2 border border-2" name="class_id" id="class_name" required>
                                    <option value="">Select Class</option>
                                    @if (!empty($classlist))
                                        @foreach ($classlist as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $class->id == $studentlist->class_id ? 'selected' : '' }}>
                                                {{ $class->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $studentlist->name }}" required />
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ $studentlist->email }}" required />
                            </div>
                            <div class="mb-4">
                                <label for="dob" class="form-label">Date Of Birth</label>
                                <input type="text" class="form-control date-picker" name="dob"
                                    value="{{ \Carbon\Carbon::parse($studentlist->dob)->format('Y-m-d') }}" required />
                            </div>

                            <div class="mb-4">
                                <label for="parent_name" class="form-label">Parents Name</label>
                                <input type="text" class="form-control" name="parent_name"
                                    value="{{ $studentlist->parent_name }}" required />
                            </div>
                            <div class="mb-4">
                                <label for="parent_contact" class="form-label">Parent Contact</label>
                                <input type="text" class="form-control" name="parent_contact" value="{{ $studentlist->parent_contact }}" required />
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label">Contact Number</label>
                                <input type="number" class="form-control" name="phone"
                                    value="{{ $studentlist->phone }}" required />
                            </div>
                            <div class="mb-4">
                                <label for="adhar_no" class="form-label">Aadhar Number</label>
                                <input type="number" class="form-control" name="aadhar_no"
                                    value="{{ $studentlist->aadhar_no }}" required />
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4" id="section-2">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Images') }}</h5>
                            <div class="mb-4">
                                <label class="form-label">{{ localize('Thumbnail') }}</label>
                                <input type="hidden" name="types[]" value="thumbnail">
                                <div class="tt-image-drop rounded">
                                    <span class="fw-semibold">{{ localize('Choose  Thumbnail') }}</span>
                                    <!-- choose media -->
                                    <div class="tt-product-thumb show-selected-files mt-3">
                                        <div class="avatar avatar-xl cursor-pointer choose-media"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                            onclick="showMediaManager(this)" data-selection="single">
                                            <input type="hidden" name="thumbnail"
                                                value="{{ $studentlist->thumbnail }}">
                                            <div class="no-avatar rounded-circle">
                                                <span><i data-feather="plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- choose media -->
                                </div>
                            </div>

                            {{-- <div class="mb-4">
                                <label for="class_name" class="form-label">Video</label>
                                <input type="hidden" value="{{ $studentlist->video }}" name="old_video" id="formFile">
                                <input class="form-control" type="file" name="video" id="formFile">
                                </div> --}}
                            {{-- @dd( asset('storage/'.$studentlist->video)) --}}
                               
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!--right sidebar-->
            <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                <div class="card tt-sticky-sidebar">
                    <div class="card-body">
                        <h5 class="mb-4">{{ localize('Student Information') }}</h5>
                        <div class="tt-vertical-step">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#section-1" class="active">{{ localize('Update Student') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
