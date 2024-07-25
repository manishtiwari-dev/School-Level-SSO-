<x-frontend.app-layout>

    @section('title')
        {{ localize('Winners') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection
   
    <section class="gallery-wrap winner-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-2">Winners</h2>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> --}}
                </div>
            </div>
            <div class="row mt-4">

                @if (!empty($SSOWinner))
                @foreach ($SSOWinner as $key => $winners)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="box">
                      <div class="image-wrap">
                       <img class="img-fluid"
                            src="{{ uploadedAsset($winners->attachment) }}"
                            alt="{{ $winners->name }}">
                      </div>
                        <div class="content">
                            <h5 class="mt-2">{{ $winners->name }}</h5>
                            <p>{{ $winners->short_description }}</p>

                            <a href="{{ route('home.winner.show', $winners->slug) }}"> <button
                                class="w-100 btn">Know More</button></a>

                        </div>
                    </div>
                </div>

                @endforeach
                @endif
              
            </div>
        </div>
    </section>



</x-frontend.app-layout>
