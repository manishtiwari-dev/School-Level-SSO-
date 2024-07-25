<x-frontend.app-layout>

    @section('title')
        {{ localize('Reference Book') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection



    <section class="gallery-wrap winner-wrap sso_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-2">Reference Book</h2>
                  
                </div>
            </div>
            <div class="row mt-4">

                @if (!empty($SSOBook))
                @foreach ($SSOBook as $key => $book)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="box">
                      <div class="image-wrap">
                        <img src="{{ uploadedAsset($book->attachment) }}" class="img-fluid"
                        alt="{{ $book->book_title }}">
                      </div>
                        <div class="content">
                            <h5 class="mt-2">{{ $book->book_title}} Class {{$book->classes->name}}</h5>
                            <p>{!! $book->content !!}</p>
                            {{-- <a href="{{ route('home.syllabus.show', $syb->slug) }}"> <button
                                class="w-100 btn">Know More</button></a>  --}}

                        </div>
                    </div>
                </div>

                @endforeach
                @endif
              
            </div>
        </div>
    </section>


    

</x-frontend.app-layout>
