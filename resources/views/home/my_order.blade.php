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
    <div class="container my-5">
    <h2 class="text-center mb-4">🛒 My Orders</h2>
    
    @if ($order->isEmpty())
        <div class="alert alert-warning text-center">
            <i class="fa fa-exclamation-circle"></i> You haven't placed any orders yet.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped shadow-sm">
                <thead class="bg-dark text-white">
                    <tr>
                        
                        <th>Product </th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order)
                        <tr>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('products/' . $order->product->image) }}" alt="Product Image" class="rounded" width="60">
                                    <div class="ml-3">
                                        <strong>{{ $order->product->title }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td>৳{{$order->product->price}}</td>
      
                            <td>
                                @if($order->status == 'in Progress')
                                    <span class="badge badge-warning">⏳ Pending</span>
                                @elseif($order->status == 'On The Way')
                                    <span class="badge badge-primary">🚚 Shipped</span>
                                @elseif($order->status == 'Delivered')
                                    <span class="badge badge-success">✅ Delivered</span>
                                @else
                                    <span class="badge badge-danger">❌ Cancelled</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                            <td>
                                
                                @if($order->status == 'in Progress')
                                    <a href="{{ url('destroy_order/' . $order->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this order?');">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                @else
                                <span>Already Processing Start</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>  

@include ('home.footer')

</body>
</html>
