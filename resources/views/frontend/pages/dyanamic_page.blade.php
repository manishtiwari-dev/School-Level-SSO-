<x-frontend.app-layout>
    @section('title')
        {{ localize('Home') }} {{ getSetting('title_separator') }} {{ $page_data->collectLocalization('title') }}
    @endsection
    


    <section class="advisory-committee sso_gap">
        <div class="container">
         <div class="row">
             <div class="col-md-12 text-center">
                 <h2 class="mb-2">{{$page_data->title}}</h2>
             </div>
         </div>
         <div class="row ">
             <div class="col-md-12">
                {!! $page_data->content ?? '' !!}
             </div>
         </div>
        
        </div>
     </section>





</x-frontend.app-layout>