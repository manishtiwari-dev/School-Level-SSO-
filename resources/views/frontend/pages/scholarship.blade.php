<x-frontend.app-layout>

    @section('title')
    {{ localize('Scholarship') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection
   
    <div id="content" class="site-content sso_gap">
      
        <section class="Register-from">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="mb-2">Scholarship</h2>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> --}}
                    </div>
                </div>
             <div class="row mt-4">
                 <div class="col-md-12 text-center">
                     <h2 class="mb-4">{{$SSOScholarship->name }}</h2>
                     <p>{!! $SSOScholarship->content ??  '' !!}</p>
                 </div>
             </div>
         
            </div>
         </section>
 


    </div>
</x-frontend.app-layout>