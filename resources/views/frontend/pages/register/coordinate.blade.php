<x-frontend.app-layout>
    @section('title')
        {{ localize('Become Coordinator') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection

 

    <section class="Register-from">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-4">BECOME COORDINATOR</h2>
                </div>
            </div>
            <div class="row">
                <form class="DataForm needs-validation" id="registerCoordinator"
                action="{{ route('register.coordinator_store') }}" method="POST" novalidate>
                @csrf
                    <div class="form">
                        <div class="row">

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Name*</label>
                                <input type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">
                                    please enter a name .
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Email*</label>
                                <input type="email" class="form-control" name="email" required="">
                                <div class="invalid-feedback">
                                    please enter a email.
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Phone*</label>
                                <input type="number" class="form-control" name="phone" required="">
                                <div class="invalid-feedback">
                                    please enter a phone number.
                                </div>

                            </div>


                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">{{ localize('Date Of Birth') }}</label>
                                <input type="date" class="form-control date-picker" name="dob" required>
                            </div>
    


                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" required="">
                                <div class="invalid-feedback">
                                    please enter a institute address .
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" required="">
                                <div class="invalid-feedback">
                                    please enter a city .
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label"> Country</label>
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

                            </div>

                            <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Pincode*</label>
                                <input type="text" class="form-control" name="pincode" required="">
                                <div class="invalid-feedback">
                                    please enter a pincode.
                                </div>
                            </div>

                            {{-- <div class="col-lg-6 mb-3 inputfield">
                                <label class="form-label">Age*</label>
                                <input type="number" class="form-control" name="age" required="">
                                <div class="invalid-feedback">
                                    please enter a age.
                                </div>
                            </div> --}}

                            <div class="col-lg-6 mb-3 inputfield">

                                <label class="form-label">Education Qualification*</label>
                                <select class="form-select select2" name="education_qualification" id="education_qualification">
                                    <option value="">Select </option>
                                    <option value="10th">10th Pass</option>
                                    <option value="12th">12th Pass </option>
                                    <option value="Bca">Bca </option>
                                    <option value="other">Other Qualification </option>

                                </select>

                                <div class="invalid-feedback">
                                    please enter a education qualification.
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3 inputfield" id="other_qualification_wrap" style="display: none;">
                                <label class="form-label">Other Qualification</label>
                                <textarea name="other_qualification" id="description" class="form-control"></textarea>
                            </div>

                        </div>
                        <button class="btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        $(document).on('submit', '#registerCoordinator', function(event) {
            event.preventDefault();
            $('#registerCoordinator').addClass('was-validated');
            if ($('#registerCoordinator')[0].checkValidity() === false) {
                event.preventDefault();
            } else {
                $('#registerCoordinator')[0].submit()
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

document.addEventListener('DOMContentLoaded', function () {
    const selectElement = document.getElementById('education_qualification');
    const otherQualificationWrap = document.getElementById('other_qualification_wrap');

    selectElement.addEventListener('change', function () {
        if (selectElement.value === 'other') {
            otherQualificationWrap.style.display = 'block';
        } else {
            otherQualificationWrap.style.display = 'none';
        }
    });
});

       
    </script>
@endpush
        

</x-frontend.app-layout>
