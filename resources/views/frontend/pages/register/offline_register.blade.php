<x-frontend.app-layout>
    @section('title')
        {{ localize('Offline Register') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection
  

    <section class="Register-from">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-4">Offline Registration Form
                    </h2>
                </div>
            </div>
            <div class="row">
             
                <form class="DataForm needs-validation" id="registerIndividual"
                action="{{ route('register.handlePrintRequest') }}" method="POST" novalidate>
                @csrf

                <div class="form">
                    <div class="row">
                        <div class="col-lg-6 mb-3 inputfield">
                            <label class="form-label">Institute Name</label>
                            <select class="form-select select2 form-control" name="institute_id"
                                id="instituteDropdown">
                                <option value="">Select Institute</option>
                                @if (!empty($collegelist))
                                    @foreach ($collegelist as $college)
                                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                                    @endforeach
                                @endif
                                <option value="0">Others</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select an institute.
                            </div>
                            @error('institute_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                      

                        <div class="col-lg-6 mb-3 inputfield">
                            <label class="form-label">{{ localize('Class Name') }}*</label>
                            <select class="form-select select2 form-control" name="class_id">
                                <option value="">Select Class</option>
                                @if (!empty($classlist))
                                    @foreach ($classlist as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                Please select a class.
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn">    <i class="fas fa-print"></i> Print
                </button>
                
            </form>


            </div>

    </section>


    @push('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            $(document).on('submit', '#registerIndividual', function(event) {
                event.preventDefault();
                $('#registerIndividual').addClass('was-validated');
                if ($('#registerIndividual')[0].checkValidity() === false) {
                    event.preventDefault();
                } else {
                    $('#registerIndividual')[0].submit()
                }
            });

        </script>

    @endpush
</x-frontend.app-layout>
