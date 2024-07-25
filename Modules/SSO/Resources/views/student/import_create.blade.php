<x-backend.app-layout>

    @section('title')
        {{ localize('Import Student') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection

    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card tt-page-header">
                    <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title">
                            <h2 class="h5 mb-lg-0">{{ localize('Import Student') }}</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 g-4">
            <!--left sidebar-->
            <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                <form action="{{ route('admin.student.importStore') }}" method="POST" class="pb-650" id="product-form" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4" id="section-1">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="college_name" class="form-label">Institute Name</label>
                                <select class="form-select select2 border border-2" name="institute_id" id="college_name"
                                    required>
                                    <option value="">Select Institute</option>
                                    @if (!empty($collegelist))
                                        @foreach ($collegelist as $college)
                                            <option value="{{ $college->id }}">{{ $college->name }}</option>
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
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                         
                            <div class="mb-4">
                                <label class="form-label">Import</label>
                                {{-- <input type="file" name="import_file"
                                data-allowed-file-extensions="xls xlsx csv txt" id=""
                                class="form-control" required> --}}
                                <input type="file" name="import_file" accept=".xls, .xlsx, .csv, .txt" class="form-control" required>

                            </div>

                            <div class="form-group col-lg-12 col-sm-12  p-2 text-lg-left text-md-left">
                                <a href="{{route('admin.simple-download-file')}}"><b>Download Sample File</b></a>
                            </div>

                        </div>
                    </div>

                 

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Import</button>
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
                                    <a href="#section-1" class="active">{{ localize('Import Student') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-backend.app-layout>
