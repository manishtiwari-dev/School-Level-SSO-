<x-backend.app-layout>

    @section('title')
        {{ localize('Register Your Institute') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection

    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Add Institute') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">

                    <form action="{{ route('admin.institute.store') }}" method="POST" class="pb-650" id="product-form">
                        @csrf
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Institute') }}</h5>
                                <div class="mb-4">
                                    <label for="name" class="form-label">Institute Name<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" id="name"
                                        name="name" value="{{ old('name') }}" required>

                                </div>

                                {{-- <div class="mb-4">
                                    <label for="email" class="form-label">Link<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="email"
                                        id="" value="{{ old('email') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter college email
                                    </div>
                                </div> --}}

                                <div class="mb-4">
                                    <label for="address" class="form-label">Address<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="address"
                                        id="address" value="{{ old('address') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter college address
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="city" class="form-label">City<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control  border border-2" name="city"
                                        value="{{ old('city') }}" id="city" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="country" class="form-label">Country<sup
                                            class="text-danger">*</sup></label>
                                    <select class="form-select select2 border border-2" name="country_id" id="country_id"
                                        required>
                                        <option selected disabled value="">Choose...</option>
                                        @forelse ($countries as $country)
                                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="state" class="form-label">State<sup
                                            class="text-danger">*</sup></label>
                                    <select class="form-select select2 border border-2" name="state_id" id="state_id"
                                        required>
                                        <option selected disabled value="">Choose...</option>
                                        @forelse ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="pincode" class="form-label">Pincode<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="pincode"
                                        id="pincode" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Logo </label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Image</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="attachment">
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


                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Contact') }}</h5>

                        
                                <div class="mb-4">
                                    <label for="contact_name" class="form-label">Contact Name<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="contact_name"
                                        id="contact_name" value="{{ old('contact_name') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter college Contact Name
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label">Contact Email<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="contact_email"
                                        id="email" value="{{ old('contact_email') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter email
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="contact_phone" class="form-label">Contact Phone<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="contact_phone"
                                        id="contact_phone" value="{{ old('contact_phone') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter college Contact Phone
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="designation" class="form-label">Designation <sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="designation"
                                        id="designation" value="{{ old('designation') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter Designation
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-4" id="section-3">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Principle') }}</h5>

                                <div class="mb-4">
                                    <label for="principle_name" class="form-label">Principle Name<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="principle_name"
                                        id="principle_name" value="{{ old('principle_name') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter college Principle Name
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="contact_phone" class="form-label">Principle Email<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="principle_email"
                                        id="contact_phone" value="{{ old('contact_phone') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter college Principle Email
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="contact_phone" class="form-label">Principle Phone<sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" class="form-control border border-2" name="principle_phone"
                                        id="contact_phone" value="{{ old('contact_phone') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter college Principle Phone
                                    </div>
                                </div>

                              
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Institute Information') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">{{ localize('Institute') }}</a>
                                    </li>
                                    <li>
                                        <a href="#section-2" class="active">{{ localize('Contact') }}</a>
                                    </li>
                                    <li>
                                        <a href="#section-3" class="active">{{ localize('Principle') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- @section('scripts')
        <script>
            $(document).on('submit', '#college_registration_form', function(e) {
                e.preventDefault();
                $('#college_registration_form').addClass('was-validated');
                if ($('#college_registration_form')[0].checkValidity() === false) {
                    event.stopPropagation();
                } else {
                    $('#college_registration_form')[0].submit();
                }
            });

            //  get states on country change
            $(document).on('change', '[name=country_id]', function() {
                var country_id = $(this).val();
                getStates(country_id);
            });
            //  get states
            function getStates(country_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: "{{ route('address.getStates') }}",
                    type: 'POST',
                    data: {
                        country_id: country_id
                    },
                    success: function(response) {
                        $('[name="state_id"]').html("");
                        $('[name="state_id"]').html(JSON.parse(response));
                    }
                });
            }
        </script>
    @endsection --}}

</x-backend.app-layout>
