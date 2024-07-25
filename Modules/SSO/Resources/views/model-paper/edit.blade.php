<x-backend.app-layout>

@section('title')
    {{ localize('Update Model Paper') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection
 
<section class="tt-section pt-4">
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card tt-page-header">
                    <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title">
                            <h2 class="h5 mb-lg-0">{{ localize('Update Model Paper') }}</h2>
                        </div>
  
                    </div>
                </div>
            </div>
        </div> 
        <div class="row mb-4 g-4">
            <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                <form action="{{ route('admin.model-paper.update') }}" method="POST" class="pb-650" id="product-form" enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $modelPaper->id }}">

                    <div class="card mb-4" id="section-1">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="class_name" class="form-label">Exam Name</label>
                                   
                                        <select class="form-control select2" name="exam_id" data-toggle="select2" 
                                        required>
                                    <option value="">Select Exam</option>
                                    @if(!empty($examlist))
                                        @foreach ($examlist as $exam)
                                            <option value="{{ $exam->id }}" {{ $exam->id == $modelPaper->exam_id ? 'selected' : '' }} >{{ $exam->name }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>


                            <div class="mb-4">
                                <label for="class_name" class="form-label">Class Name</label>
                                    <select class="form-select  border border-2" name="class_id" id="class_name" required>
                                    <option value="">Select Class</option>
                                    @if(!empty($classlist))
                                        @foreach ($classlist as $class)
                                            <option value="{{ $class->id }}" {{ $class->id == $modelPaper->class_id ? 'selected' : '' }} >{{ $class->name }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="class_name" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" id="" required value=" {{( $modelPaper->name ?? '') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="class_name" class="form-label">Content</label>
                                    <textarea  class="editor" name="content" required>
                                        {{( $modelPaper->content ?? '') }}
                                    </textarea>
                                    </div>
                           
 
                        </div>
                    </div>

                    <div class="card mb-4" id="section-2">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Images') }}</h5>
                            <div class="mb-4">
                                <label class="form-label">{{ localize('Thumbnail') }}</label>
                                <input type="hidden" name="types[]" value="attachment">
                                <div class="tt-image-drop rounded">
                                    <span class="fw-semibold">{{ localize('Choose Thumbnail') }}</span>
                                    <!-- choose media -->
                                    <div class="tt-product-thumb show-selected-files mt-3">
                                        <div class="avatar avatar-xl cursor-pointer choose-media"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                            onclick="showMediaManager(this)" data-selection="single">
                                            <input type="hidden" name="attachment"
                                                value="{{ $modelPaper->attachment }}">
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
                    <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!--right sidebar-->
            <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                <div class="card tt-sticky-sidebar">
                    <div class="card-body">
                        <h5 class="mb-4">{{ localize('Model Paper Information') }}</h5>
                        <div class="tt-vertical-step">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#section-1" class="active">{{ localize('Update Model Paper') }}</a>
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


