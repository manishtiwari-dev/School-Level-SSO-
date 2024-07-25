<x-frontend.app-layout>

    @section('title')
    {{ localize('Events Details') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection


    <section class="syllabus-section">
        <div class="container">
            <div class="space-50"></div>
            <div class="row ">
                <div class="col-lg-12">
                    <h2>News and Events</h2>
                </div>
            </div>

            <div class="row">
                <div class="">
                    <div class=" d-flex">
                        @if (!empty($events))
                            @foreach ($events as $key => $event)
                                <div class="card p-2 d-flex">
                                    <a href="{{ route('home.events.show', $event->slug) }}"> <img class="img-fluid"
                                            src="{{ uploadedAsset($event->banner) }}"
                                            alt="{{ $event->title }}"></a>
                                    <div class="content">
                                        <h5 class="text-center mt-2 mb-1">{{ $event->title }}</h5>
                                        <p> {{ Str::limit($event->short_description, 20) }}
                                            
                                        </p>
                                        <a href="{{ route('home.events.show', $event->slug) }}"> <button
                                                class="w-100 btn">Know More</button></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{ $events->links('vendor.pagination.bootstrap') }}
                </div>
            </div>
            <div class="space-50"></div>
        </div>
    </section>



</x-frontend.app-layout>