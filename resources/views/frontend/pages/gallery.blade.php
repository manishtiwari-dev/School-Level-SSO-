<x-frontend.app-layout>

    @section('title')
        {{ localize('Gallery') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection

  
    <section class="gallery-wrap sso_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-2">GALLERY</h2>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> --}}
                </div>
            </div>
            <div class="row mt-4">
                @if (!empty($SSOGallery))
                @foreach ($SSOGallery as $key => $gallery)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="box">
                      <div class="image-wrap">
                        <img src="{{ uploadedAsset($gallery->attachment) }}" class="img-fluid" alt="{{ $gallery->name }}">

                      </div>
                        <div class="content">
                            <h5 class="mt-2">{{ $gallery->name }}</h5>
                            <p>{{ $gallery->content }}
                            </p>

                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

</x-frontend.app-layout>
