<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style type ="text/css">
input[type='text']
{
  width :400px;
  height:50px;
}
.div_deg{
  display:flex;
  justify-content:center;
  align-items:center;
  margin:30px;
}
 </style>
  </head>
  <body>
  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <h1 style="color:white;">ORDER LIST</h1>
         <div class="div_deg">
          
       
            
            @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
           @endif  
           @if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

          
          
        </div>
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table table-hover no-wrap product-order" data-page-size="10">
                            <tr>
                                <th>SL</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Product Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Payment</th>
                                <th>Change Status</th>
                                <th>Print</th>
                        
                            </tr>
                            <?php

                         $menuListCount= count($menuList);

                            ?>
                       @foreach ($menuList as $menuLists)
                    <tr>
                       
                       <td>{{ $loop->index+1 }}</td>
                       <td>
                         {{ $menuLists->name }}
                      </td>
                      <td>
                         {{ $menuLists->phone }}
                      </td>
                      <td>
                         {{ $menuLists->address }}
                      </td>
                      <td>
                         {{ $menuLists->product->title }}
                      </td>
                      <td>
                         {{ $menuLists->product->price }}
                      </td>
                      <td>
                        <img height="50" width="30" src="products/{{ $menuLists->product->image}}">
                      </td>
                      <td>
                        @if($menuLists->status=='in Progress')
                        <span style="color:red"> {{ $menuLists->status}}</span>
                        @else
                        <span>{{$menuLists->status}}</span>
                        @endif
                      </td>
                      <td>{{$menuLists->payment_status}}</td>
                     <td>
                        <div class="mb-2">

                        <!--sometimes get error <a> tag  then use this--> <!--sometimes get error <a> tag  then use this-->
                        <a class="btn btn-primary" href="{{ url('on_the_way/' . $menuLists->id) }}">On the Way</a>

                       </div>
                         <a class="btn btn-success" href="{{ url('delivered/' . $menuLists->id) }}">Delivered</a>

                      </td>
                      <td>
                
                        <a class="btn btn-secondary" href="{{ url('print/' . $menuLists->id) }}">Print</a>

                        </td>
                     </tr>

                      @endforeach

                    </table>    

        
                     </div>
                 </div>
             </div>
             <div class="pagination justify-content-center mt-3">
             {{ $menuList->links() }}    
    <!-- JavaScript files-->
       <!-- Include SweetAlert2 -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Your custom JavaScript for delete confirmation -->
<script>
    function confirmation(categoryId) {
        event.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ url('destroy') }}/" + categoryId;
            }
        });
    }
</script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
    <script>
    setTimeout(function() {
        $(".alert").fadeOut(500);
    }, 5000); // Message disappears after 5 seconds
     </script>
    
    

  </body>
</html>