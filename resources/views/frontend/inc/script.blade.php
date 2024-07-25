    <!-- jQuery -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/assets/js/header-mobile.js') }}"></script>
    <script src="{{ asset('frontend/common/js/toastr.min.js') }}"></script>
    <script src="{{ asset('frontend/common/js/flatpickr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // ajax toast 
        function notifyMe(level, message) {
            if (level == 'danger') {
                level = 'error';
            }
            toastr.options = {
                "timeOut": "50000",
                "closeButton": true,
                "positionClass": "toast-top-center",
            };
            toastr[level](message);
        }
        @foreach (session('flash_notification', collect())->toArray() as $message)

            notifyMe("{{ $message['level'] }}", "{{ $message['message'] }}");
        @endforeach


        @if (!empty($errors->all()))
            @foreach ($errors->all() as $error)
                notifyMe("error", '{{ $error }}')
            @endforeach
        @endif
    </script>

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
    <script>
        "use strict"
        $(function() {
             //    select2 js
        $(".select2").select2();
            //    flatpickr 
            $(".date-picker").each(function(el) {
                var $this = $(this);
                var options = {
                    dateFormat: 'Y-m-d'
                };

                var date = $this.data("date");
                if (date) {
                    options.defaultDate = date;
                }

                $this.flatpickr(options);
            });
        })




        $("#testimonials-slider").owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: true,
            /*
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            */
            responsiveClass: true,
            autoHeight: true,
            autoplayTimeout: 7000,
            smartSpeed: 800,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },

                600: {
                    items: 2
                },

                1024: {
                    items: 2
                },

                1366: {
                    items: 2
                }
            }
        });

        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) { // You can adjust this value
                    $('.mobile-nav').addClass('sticky');
                } else {
                    $('.mobile-nav').removeClass('sticky');
                }
            });

            
        });
    </script>
