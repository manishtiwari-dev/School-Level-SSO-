<x-backend.app-layout>

@section('title')
    {{ localize('Competition') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Update Competition') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.competition.update') }}" method="POST" enctype="multipart/form-data" id="product-form"
                        class="pb-650">
                        @csrf
                        <input type="hidden" name="id" value="{{ $examData->id }}">

                        <!--general settings-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('General Informations') }}</h5>

                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ localize('Name') }}</label>
                                    <input type="text" id="system_title" name="name" class="form-control"
                                        value="{{$examData->name ?? ''}}">
                                </div>

                                <div class="mb-3">
                                    <label for="title_separator"
                                        class="form-label">{{ localize('Navbar Name') }}</label>
                                    <input type="text" id="title_separator" name="nav_name" class="form-control"
                                        value="{{$examData->nav_name ?? ''}}">
                                </div>

                            </div>
                        </div>
                        <!--general settings-->



                        <!--About settings-->
                        <div class="card mb-4" id="section-3">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Exam About') }}</h5>
                                <div class="mb-3">
                                    <label for="admin_panel_logo"
                                        class="form-label">{{ localize('About') }}</label>
                                    <textarea  class="editor" name="about" required>
                                        {{$examData->about ?? ''}}
                                    </textarea>
                                </div>

                               
                            </div>
                        </div>
                        <!--About settings-->

                        <!--how to participate settings-->
                        <div class="card mb-4" id="section-4">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('How To Participate') }}</h5>
                                <div class="mb-3">
                                    <label for="enable_maintenance_mode"
                                        class="form-label">{{ localize('How To Participate') }}</label>
                                    <textarea  class="editor" name="how_to_participate" required>
                                        {{$examData->how_to_participate ?? ''}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <!--how to participate settings-->


                         <!--how to participate settings-->
                         <div class="card mb-4" id="section-5">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Exam Dates') }}</h5>
                                <div class="mb-3">
                                    <label for="enable_maintenance_mode"
                                        class="form-label">{{ localize('Exam Date') }}</label>
                                    <textarea  class="editor" name="exam_dates" required>
                                        {{$examData->exam_dates ?? ''}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <!--how to participate settings-->


                    

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> {{ localize('Save Configuration') }}
                            </button>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Configure Competition') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">{{ localize('General Information') }}</a>
                                    </li>
                                    <li>
                                        <a href="#section-3">{{ localize('Exam About') }}</a>
                                    </li>
                                    <li>
                                        <a href="#section-4">{{ localize('How To Participate') }}</a>
                                    </li>
                                    <li>
                                        <a href="#section-5">{{ localize('Exam Dates') }}</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('scripts')
    <script>
        "use strict";

        // runs when the document is ready --> for media files
        $(document).ready(function() {
            getChosenFilesCount();
            showSelectedFilePreviewOnLoad();
        });
    </script>
@endsection

</x-backend.app-layout>
