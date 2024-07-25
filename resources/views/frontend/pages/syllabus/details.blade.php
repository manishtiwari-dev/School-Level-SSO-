<x-frontend.app-layout>

    @section('title')
    {{ localize('Syllabus Details') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection
   

    <div id="content" class="site-content sso_gap">
        <section class="m-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                        <img src="{{ uploadedAsset($syllabus->attachment) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="content p-2">
                            <h4 class="text-center">{{$syllabus->name ?? ''}}</h4>
                            <p class=""> {!! $syllabus->content !!}</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-frontend.app-layout>