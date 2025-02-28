<section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box"> 
                      <h1>
                        Welcome To Our <br>
                         Shop
                      </h1>
                      <p>
                        Buy Happiness </br>
                        Stay With us
                      </p>
                      <a href="{{url('help')}}">
                        Contact Us
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                  <div class="swiper-container">
                  <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                     <div class="swiper-slide">
                    <img src="{{ asset('banners/' . $banner->image) }}" alt="Banner Image" style="width:100%;">
                   </div>
                 @endforeach
                  </div>
                  </div>
                  </div>
    
    <!-- Swiper Pagination (Optional) -->
    <div class="swiper-pagination"></div>
</div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper('.swiper-container', {
            loop: true,                  // Infinite looping
            autoplay: { 
                delay: 3000,             // Show each image for 2 seconds
                disableOnInteraction: false  // Keep autoplay after user interaction
            },
            effect: 'fade',// Smooth fade transition (change to 'slide' for sliding effect)

            fadeEffect: { 
                crossFade: true               // Ensures the old image fades out before new one appears
            },
            speed: 1000,                 // Transition speed (1s)

            pagination: {
                el: '.swiper-pagination', 
                clickable: true           // Dots for navigation (optional)
            }
        });
    });
</script>