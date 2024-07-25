<x-frontend.app-layout>

    @section('title')
        {{ localize('Success') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection


    
    <div id="content" class="site-content">
        <section class="m-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="content p-2">
                            <h4 class="text-center">Registration Successfully</h4>
                            <p class=""> </p>
                            <div class="text-center">
                            <a href="{{ url('/') }}" class="text-center"> <button class="btn btn-success "> Back To Our Homepage</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


</x-frontend.app-layout>