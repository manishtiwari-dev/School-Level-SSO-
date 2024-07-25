<x-frontend.app-layout>
    @section('title')
        {{ localize('Register') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection

    {{-- <section class="registration-wrapper">
        <div class="container">
            <div class="wrapper-form">
                <div class="title">
                    Registration Form
                </div>
                <form class="DataForm needs-validation" id="registerInstitute"
                    action="{{ route('register.instituteStore') }}" method="POST" novalidate>
                    @csrf
                    <div class="form">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="mb-4">{{ localize('Contact Details') }}</h5>
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Name') }}*</label>
                                <input type="text" class="form-control" name="contact_name" required>
                                <div class="invalid-feedback">
                                    please enter a name.
                                </div>
                                @error('contact_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Email') }}*</label>
                                <input type="email" class="form-control" name="contact_email" required>
                                <div class="invalid-feedback">
                                    please enter a email.
                                </div>
                                @error('contact_email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Phone') }}*</label>
                                <input type="text" class="form-control" name="contact_phone" required>
                                <div class="invalid-feedback">
                                    please enter a phone number.
                                </div>
                                @error('contact_phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="col-lg-12">
                                <h5 class="mb-4">{{ localize('Institute Details') }}</h5>
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Institute Name') }}*</label>
                                <input type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    please enter a institute name .
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Institute Address') }}*</label>
                                <input type="text" class="form-control" name="address" required>
                                <div class="invalid-feedback">
                                    please enter a institute address .
                                </div>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Institute City') }}*</label>
                                <input type="text" class="form-control" name="city" required>
                                <div class="invalid-feedback">
                                    please enter a institute city .
                                </div>
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label> {{ localize('Country') }}*</label>
                                <select class="form-select select2 form-control" name="country_id">
                                    @if (!empty($country_data))
                                        @foreach ($country_data as $country)
                                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="invalid-feedback">
                                    please select a country.
                                </div>
                                @error('country_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="col-lg-6 inputfield">
                                <label> {{ localize('State') }}*</label>
                                <select class="form-select select2 form-control" name="state_id">
                                    <option value="">Select City</option>
                                    @if (!empty($state_list))
                                        @foreach ($state_list as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    @endif
                                </select>

                                <div class="invalid-feedback">
                                    please select a state.
                                </div>
                                @error('state_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Pincode') }}*</label>
                                <input type="text" class="form-control" name="pincode" required>
                                <div class="invalid-feedback">
                                    please enter a pincode.
                                </div>
                                @error('pincode')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <h5 class="mb-4">{{ localize('Principal Details') }}</h5>
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Principal Name') }}*</label>
                                <input type="text" class="form-control" name="principle_name" required>
                                <div class="invalid-feedback">
                                    please enter a principal name.
                                </div>
                                @error('principle_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Principal Email') }}*</label>
                                <input type="email" class="form-control" name="principle_email" required>
                                <div class="invalid-feedback">
                                    please enter a principal email.
                                </div>
                                @error('principle_email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 inputfield">
                                <label>{{ localize('Principal Contact') }}*</label>
                                <input type="text" class="form-control" name="principle_phone" required>
                                <div class="invalid-feedback">
                                    please enter a principal contact.
                                </div>
                                @error('principle_phone')
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
                    <h2 class="mb-4">Registration As  School

                    </h2>
                </div>
            </div>
            <div class="row">
               <form class="DataForm needs-validation" id="registerInstitute"
                    action="{{ route('register.instituteStore') }}" method="POST" novalidate>
                    @csrf
                    <div class="form">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="mb-4 sub-heading mb-4"><span style="color: #ef3b3f;">Contact Details</span>
                                </h5>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Name*</label>
                                <input type="text" class="form-control" name="contact_name" required="">
                                <div class="invalid-feedback">
                                    please enter a name.
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Email*</label>
                                <input type="email" class="form-control" name="contact_email" required="">
                                <div class="invalid-feedback">
                                    please enter a email.
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Phone*</label>
                                <input type="number" class="form-control" name="contact_phone" required="">
                                <div class="invalid-feedback">
                                    please enter a phone number.
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <h5 class="mb-4 mt-4 sub-heading mb-4"><span style="color: #ef3b3f;">Institute Details
                                    </span></h5>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Institute Name*</label>
                                <input type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">
                                    please enter a institute name .
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Institute Address*</label>
                                <input type="text" class="form-control" name="address" required="">
                                <div class="invalid-feedback">
                                    please enter a institute address .
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Institute City*</label>
                                <input type="text" class="form-control" name="city" required="">
                                <div class="invalid-feedback">
                                    please enter a institute city .
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label"> Country*</label>
                                <select class="form-select select2" name="country_id">

                                    @if (!empty($country_data))
                                    @foreach ($country_data as $country)
                                        <option value="{{ $country->code }}">{{ $country->name }}</option>
                                    @endforeach
                                @endif


                                  
                                </select>
                                <div class="invalid-feedback">
                                    please select a country.
                                </div>

                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">State*</label>
                                <select class="form-select select2" name="state_id">
                                    <option value="">Select State</option>
                                    @if (!empty($state_list))
                                    @foreach ($state_list as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                @endif
                                </select>

                                <div class="invalid-feedback">
                                    please select a state.
                                </div>

                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Pincode*</label>
                                <input type="text" class="form-control" name="pincode" required="">
                                <div class="invalid-feedback">
                                    please enter a pincode.
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h5 class="mb-4 mt-4 sub-heading mb-4"><span style="color: #ef3b3f;">Principal Details
                                    </span></h5>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Principal Name*</label>
                                <input type="text" class="form-control" name="principle_name" required="">
                                <div class="invalid-feedback">
                                    please enter a principal name.
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Principal Email*</label>
                                <input type="email" class="form-control" name="principle_email" required="">
                                <div class="invalid-feedback">
                                    please enter a principal email.
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Principal Contact*</label>
                                <input type="number" class="form-control" name="principle_phone" required="">
                                <div class="invalid-feedback">
                                    please enter a principal contact.
                                </div>
                            </div>
                        </div>
                        <button class="btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).on('submit', '#registerInstitute', function(event) {
                event.preventDefault();
                $('#registerInstitute').addClass('was-validated');
                if ($('#registerInstitute')[0].checkValidity() === false) {
                    event.preventDefault();
                } else {
                    $('#registerInstitute')[0].submit()
                }
            });
        </script>
    @endpush
</x-frontend.app-layout>
