<!DOCTYPE html>
<html>

<head>


@include('home.css')

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
      @foreach($products as $product)

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="{{url('details_product',$product->id)}}">
              <div class="img-box">
                <img src="products/{{$product->image}}" alt="">
              </div>
              <div class="detail-box">
                
                <h6>
                  {{$product->title}}
                </h6>
                <h6>
                ৳
                  <span>
                    {{$product->price}}
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
              <div>
              <a class="btn btn-danger" style="margin-right:30px" href="{{url('details_product', $product->id)}}">details
              </a>  
              <a href="{{url('cart_product', $product->id)}}" class="btn btn-primary">Add to Cart</a>
              </div>
            </a>
          </div>
        </div>
        @endforeach

      </div>
     
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>
  

    @include ('home.footer')

</body>
</html>
