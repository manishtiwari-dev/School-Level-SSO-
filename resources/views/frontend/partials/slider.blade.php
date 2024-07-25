 {{-- <section class="banner">
     <div id="carouselExampleIndicators" class="carousel slide">

         <div class="carousel-inner">

             @if (!empty($sliders))
                 @foreach ($sliders as $key => $slider)
                     <div class="carousel-item {{ $key == 1 ? ' active' : '' }}">
                         <img src="{{ uploadedAsset($slider->desktop_image) }}" class="d-block w-100" alt="...">
                     </div>
                 @endforeach

             @endif

         </div>

         <ol class="carousel-indicators">
             <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active">
             </li>
             <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
             <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
         </ol>
     </div>
 </section> --}}

 <div class="banner-wrapper">
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="6"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
          
          
            {{-- <div class="carousel-item">
                <img src="images/Banner-3.webp" alt="New York" class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img src="images/Banner-4.webp" alt="New York" class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img src="images/Banner-5.webp" alt="New York" class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img src="images/Banner-6.webp" alt="New York" class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img src="images/Banner-7.webp" alt="New York" class="d-block w-100" />
            </div> --}}

            @if (!empty($sliders))
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 1 ? ' active' : '' }}">
                    <img src="{{ uploadedAsset($slider->desktop_image) }}" class="d-block w-100" alt="...">
                </div>
              
            @endforeach

        @endif



        </div>
    </div>
</div>