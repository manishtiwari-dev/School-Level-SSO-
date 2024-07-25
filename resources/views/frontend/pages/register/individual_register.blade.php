<x-frontend.app-layout>
    @section('title')
        {{ localize('Register') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection
    {{--    
    <section class="registration-wrapper">
        <div class="container">
            <div class="wrapper-form">
                <div class="title">
                    Registration As Individual
                </div>
                <form class="DataForm needs-validation" id="registerInstitute"
                action="{{ route('register.individual_store') }}" method="POST" novalidate>
                @csrf
                <div class="form">
                    <div class="row">
                       
                        <div class="col-lg-6 inputfield">
                            <label>{{ localize('Name') }}*</label>
                            <input type="text" class="form-control" name="name" required>
                            <div class="invalid-feedback">
                                please enter a  name.
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 inputfield">
                            <label>{{ localize('Email') }}*</label>
                            <input type="email" class="form-control" name="email" required>
                            <div class="invalid-feedback">
                                please enter a  email.
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 inputfield">
                            <label>{{ localize('Phone') }}*</label>
                            <input type="text" class="form-control"  name="phone" required>
                            <div class="invalid-feedback">
                                please enter a  phone number.
                            </div>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                      
                        <div class="col-lg-6 inputfield">
                            <label>{{ localize('Institute Name') }}*</label>
                            <select class="form-select select2 form-control" name="institute_id">
                                <option value="">Select Institute</option>
                                @if (!empty($collegelist))
                                @foreach ($collegelist as $college)
                                <option value="{{$college->id}}">{{$college->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                please select a institute.
                            </div>
                            @error('institute_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    
                        <div class="col-lg-6 inputfield">
                            <label> {{ localize('Class Name') }}*</label> 
                            <select class="form-select select2 form-control" name="class_id">
                                <option value="">Select Class</option>
                                @if (!empty($classlist))
                                @foreach ($classlist as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                please select a class.
                            </div>
                            @error('class_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            
                        </div>

                        <div class="col-lg-6 inputfield">
                            <label>{{ localize('Date Of Birth') }}*</label>
                            <input type="date" class="form-control date-picker" name="dob" required>
                        </div>

                       
                        
                        <div class="col-lg-6 inputfield">
                            <label>{{ localize('Parent Name') }}*</label>
                            <input type="text" class="form-control" name="parent_name" required>
                            <div class="invalid-feedback">
                                please enter a  parent name.
                            </div>
                            @error('parent_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                      
                        <div class="col-lg-6 inputfield">
                            <label>{{ localize('Parent Contact') }}*</label>
                            <input type="text" class="form-control" name="parent_contact" required>
                            <div class="invalid-feedback">
                                please enter a  parent contact.
                            </div>
                            @error('parent_contact')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                      

                        <div class="col-lg-6 inputfield">
                            <label>Aadhar Number*</label>
                            <input type="text" class="form-control" name="aadhar_no" required>
                            <div class="invalid-feedback">
                                please enter a  aadhar no.
                            </div>
                            @error('aadhar_no')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button class="btn">Register</button>
                </div>
                </form>
            </div>
        </div>
    </section> --}}

    <section class="Register-from">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-4">Registration As Individual
                    </h2>
                </div>
            </div>
            <div class="row">
                <form class="DataForm needs-validation" id="registerIndividual"
                    action="{{ route('register.individual_store') }}" method="POST" novalidate>
                    @csrf

                    <div class="form">
                        <div class="row">

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Name*</label>
                                <input type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    Please enter a name.
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Email*</label>
                                <input type="email" class="form-control" name="email" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email.
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Phone*</label>
                                <input type="number" class="form-control" name="phone" pattern="^\d{10}$" required>
                                <div class="invalid-feedback">
                                    Please enter a valid 10-digit phone number.
                                </div>
                            </div>

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

                            <div class="col-lg-6 mb-3 inputfield" id="otherInstituteInput" style="display:none;">
                                <label class="form-label">Other Institute Name</label>
                                <input type="text" class="form-control" name="other_institute">
                                <div class="invalid-feedback">
                                    Please enter an institute name.
                                </div>
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

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">{{ localize('Date Of Birth') }}*</label>
                                <input type="date" class="form-control date-picker" name="dob" required>
                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">{{ localize('Parent Name') }}*</label>
                                <input type="text" class="form-control" name="parent_name" required>
                                <div class="invalid-feedback">
                                    Please enter a parent name.
                                </div>
                                @error('parent_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">{{ localize('Parent Contact') }}*</label>
                                <input type="number" class="form-control" name="parent_contact" pattern="^\d{10}$"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter a valid 10-digit parent contact number.
                                </div>
                                @error('parent_contact')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Aadhar Number*</label>
                                <input type="number" class="form-control" name="aadhar_no" pattern="^\d{12}$" required>
                                <div class="invalid-feedback">
                                    Please enter a valid 12-digit Aadhaar number.
                                </div>
                                @error('aadhar_no')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <button class="btn">Register</button>
            </div>
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



            $(document).ready(function() {
                $(".date-picker").each(function() {
                    var $this = $(this);
                    var options = {
                        dateFormat: 'Y-m-d',
                        maxDate: new Date() // Set maximum date to today to prevent future dates
                    };

                    var date = $this.data("date");
                    if (date) {
                        options.defaultDate = date;
                    }

                    $this.flatpickr(options);
                });
            });
        </script>

        <script>
            document.getElementById('instituteDropdown').addEventListener('change', function() {
                var dropdown = this;
                var otherInput = document.getElementById('otherInstituteInput');

                if (dropdown.value === '0') {
                    //  dropdown.style.display = 'none';
                    otherInput.style.display = 'block';
                } else {
                    otherInput.style.display = 'none';
                }
            });
        </script>
    @endpush
</x-frontend.app-layout>
