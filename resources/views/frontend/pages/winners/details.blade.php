<x-frontend.app-layout>

    @section('title')
    {{ localize('Winner Details') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection


    <div id="content" class="site-content">
        <section class="m-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="content p-2">
                            <h4 class="text-center"></h4>
                            <p class=""> {!! $SSOWinner->content ??  '' !!}</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</x-frontend.app-layout>