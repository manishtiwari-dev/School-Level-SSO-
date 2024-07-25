<x-frontend.app-layout>

    @section('title')
        {{ localize('Conatct Us') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection

    <!-- contactus-section -->
 
    
    <section class="testimonials contactus-wrap">

        <div class="container">
           
            <div class="Contactus">
                <div class="row">
                    <div class="col-lg-6 col-lx-6">
                        <img src="{{ asset('frontend/assets/images/Contact-image.png') }}" alt=""
                        class="img-fluid">
                    </div>
                    <div class="col-lg-6 p-0 pt-3 pb-3 col-lx-6">
                        <h3 class="text-center">Contact Now</h3>
                        <div class="contact-form">
                            <nav aria-label="breadcrumb">
                                <h5 class="text-center">Drop us messege for any query </h5>

                            </nav>

                            <form class="DataForm needs-validation" id="contactForm"
                            action="{{ route('contactUs.store') }}" method="POST" novalidate>
                            @csrf

                                <div class="mb-3 mt-3">
                                     <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Your Full Name" required>
                                    <div class="invalid-feedback">
                                        please enter a full name.
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter  Email" required>
                                    <div class="invalid-feedback">
                                        please enter a email.
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Enter Phone No.">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="7"
                                    placeholder="Leave a Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    @push('scripts')
        <script>
            $(document).on('submit', '#contactForm', function(event) {
                event.preventDefault();
                $('#contactForm').addClass('was-validated');
                if ($('#contactForm')[0].checkValidity() === false) {
                    event.preventDefault();
                } else {
                    $('#contactForm')[0].submit()
                }
            });
        </script>
    @endpush
</x-frontend.app-layout>
