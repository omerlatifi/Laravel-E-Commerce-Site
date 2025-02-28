<!DOCTYPE html>
<html>

<head>


@include('home.css')

    <style>
        body {
            background-color: #f5f5f5;
        }
        .checkout-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            background: #333;
            color: white;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
        }
        .summary-box {
            background: #f8f8f8;
            padding: 15px;
            border-radius: 5px;
        }
        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        .total-price {
            font-size: 20px;
            font-weight: bold;
            color: red;
        }
        .continue-btn {
            background: #ff6600;
            color: white;
            font-weight: bold;
        }
        .cart-item {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
}
.cart-info {
   
    display: flex;
    flex-direction: column;
}

.cart-info h4 {
    font-size: 16px;
    margin: 5px 0;
}

.cart-info p {
    font-size: 14px;
    color: #555;
}
.remove-btn {
    position: absolute;
    margin-left: 300px;
    margin-top: 10px;
    transform: translateY(-50%);
    color: red;
    font-size: 18px;
    cursor: pointer;
    text-decoration: none;
}
    </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    <div class="container checkout-container">
    <div class="row">
        <!-- Left Section - Shipping Form -->
        <div class="col-md-7">
            <div class="section-title">SHIPPING</div>
            
            @php
                 $item = $cart->first();
             @endphp

             @if ($item)
             <form action="{{ url('comfirm_order') }}" method="post">
            @csrf
                <div class="mb-3 mt-3"> 
                    <label class="form-label"> Name *</label>
                    <input type="text" class="form-control" value="{{ $item->user->name}}" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number *</label>
                    <input type="text" class="form-control" value="{{ $item->user->phone}}" name="phone" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address *</label>
                    <input type="text" class="form-control" value="{{ $item->user->address}}" name="address" required>
                </div>
                <div class="mb-3">
                <label class="form-label">Select Location*</label>
                    <div>
                        <input type="radio" name="delivery" value="inside" checked> Inside Dhaka
                    </div>
                    <div>
                        <input type="radio" name="delivery" value="outside"> Outside Dhaka
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Promotional code</label>
                    <input type="text" class="form-control" placeholder="If You Have" name="code">
                </div>
             
                <input type="submit" class="btn continue-btn mt-3" value="PAY CASH">
               
            </form>
            @endif
            <?php
           $value= $cart->sum(fn($item) => $item->product->price);
            ?>
            <a class="btn btn-primary mt-3" href="{{ url('stripe/' . $value) }}">PAY ONLINE</a>

            
           
              
                

        </div>

        <!-- Right Section - Order Summary -->
        <div class="col-md-5">
            <div class="summary-box">
                <h5 class="mb-3">SUMMARY</h5>
                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span>{{ $cart->sum(fn($item) => $item->product->price) }} </span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Shipping & Handling</span>
                    <span>100</span>
                </div>
                
                <hr>
                <div class="d-flex justify-content-between total-price">
                    <span>Total</span>
                    <span>{{ $cart->sum(fn($item) => $item->product->price)+100}}</span>
                </div>
        
            </div>
           
            <!-- Cart Item -->
            <div class="mt-4">
                <h5>IN YOUR CART ({{$count}})</h5>
                @foreach($cart as $item)
                <div class="cart-item">
                    <img src="/products/{{ $item->product->image }}" alt="Product Image">
                    <div class="cart-info">
                        <h4>{{ $item->product->title }}</h4>
                        <p>Price: {{ $item->product->price }} Taka</p>
                    </div>
                    <a href="{{ url('destroy_cart', $item->id) }}" class="remove-btn" >❌</a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>




@include ('home.footer')

</body>
</html>