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
    <form action="{{url('comfirm_order')}}" method="post">


@csrf

   <div class="form-group">
       <label for="Product_title">Name </label>
       <input type="text" class="form-control" name="title" value="{{Auth::user()->name}}" required>
   </div>
   <div class="form-group">
       <label for="description">Phone Number</label>
       <input class="form-control" name="phone" value="{{Auth::user()->phone}}" required>
   </div>

   <div class="form-group">
       <label for="price">Address</label>
       <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" required>
   </div>
   <div class="form-group">
       <label for="delivery">Select Location</label>
        <div>
        <input type="radio" class="form-control" name="delivery" value="inside" checked>Inside Dhaka
        </div> 
        <div>
        <input type="radio" class="form-control" name="delivery" value="outside" checked>Outside Dhaka
        </div>   
          
      

   <div class="form-group">
       <label for="quantity">Promotional Code</label>
       <input type="text" class="form-control" name="code"  placeholder="If you have" >
   </div>

   
       
   </div>
         <button type="submit" class="btn btn-primary">Cash Payment</button>
   </div>
</form>

   

  <!-- footer section -->

@include ('home.footer')

</body>
</html>
