<!DOCTYPE html>
<html>

<head>


@include('home.css')
<style>
    .product-img {
    width: 100%; /* Full width of container */
    max-width: 400px; /* Set maximum width */
    height: 400px; /* Fixed height */
    object-fit: cover; /* Ensures proper cropping */
    border-radius: 10px; /* Optional: Rounded corners */
}
</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    

    <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <img src="/products/{{$products->image}}" class="product-img" alt="{{ $products->title }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $products->title }}</h2>
            <p><strong>Category:</strong> {{ $products->category }}</p>
            <p><strong>Description:</strong> {{ $products->description }}</p>
            <p><strong>Price:</strong> {{ $products->price }} </p>
            <p><strong>Available Quantity:</strong> {{ $products->quantity }}</p>
            <a href="{{url('cart_product', $products->id)}}" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
</div>
<!--all product_section-->
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
      @foreach($all_product as $product)

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="{{url('details_product',$product->id)}}">
              <div class="img-box">
                <img src="/products/{{$product->image}}" alt="">
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
        <a href="{{url('shop')}}">
          View All Products
        </a>
      </div>
    </div>
  </section>






   

  <!-- footer section -->

@include ('home.footer')

</body>
</html>
