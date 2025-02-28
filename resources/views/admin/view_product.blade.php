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
input[type='search']
{
  width :200px;
  height:30px;
}
    .col-id { width: 5%; }
    .col-title { width: 15%; }
    .col-description { width: 30%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .col-price { width: 10%; }
    .col-quantity { width: 10%; }
    .col-category { width: 15%; }
    .col-actions { width: 15%; }
    
        .search-container {
          position: absolute;
            top: 20px;
            right: 30px;
        }

        .search-input {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            width: 250px;
            height: 120px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: white;
            z-index: 100;
        }
        .search-input input {
             flex: 1;
             padding: 8px;
             border: 1px solid #ccc;
             border-radius: 5px;
              margin-bottom: 10px; /* Adds spacing between input and button */
          }

        /* Search button styling */
          .search-input button {
             padding: 8px 15px;
             border-radius: 5px;
            border: none;
            background-color: #007bff;
           color: white;
            cursor: pointer;
          }
        .search-icon {
            cursor: pointer;
            font-size: 20px;
        }

 </style>
  </head>
  <body>
  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <h1 style="color:white;">VIEW PRODUCT</h1>
          <!-- Search Button -->
        <div class="search-container">
            <i class="fa fa-search search-icon" onclick="toggleSearch()"></i>
            <form action="{{ url('product_search') }}" method="GET" class="search-input" id="searchBox">
                <input  name="search" placeholder="Search product..." required>
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
        </div>
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

        </div>
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table table-hover no-wrap product-order" data-page-size="10">
                            <tr>
                            <th class="col-id">ID</th>
                            <th class="col-title">Title</th>
                            <th class="col-description">Description</th>
                            <th class="col-price">Price</th>
                           <th class="col-quantity">Quantity</th>
                           <th class="col-category">Category</th>
                           <th class="col-image">Image</th>
                           <th class="col-actions">Actions</th>
                            </tr>
                            <?php

                         $productsCount= count($products);

                            ?>
                       @foreach ($products as $prod)
                       <tr>
                       
                       <td>{{ $loop->index+1 }}</td>
                       <td>
                         {{ $prod->title}}
                      </td>
                      <td class="col-description" title="{{ $prod->description }}">
                      {{ Str::limit($prod->description, 10) }}
                      </td>
                      <td>
                         {{ $prod->price}}
                      </td>
                      <td>
                         {{ $prod->quantity}}
                      </td>
                      <td>
                         {{ $prod->category}}
                      </td>
                      <td>
                        <img height="50" width="30" src="products/{{ $prod->image}}">
                      </td>
                     
                      <td>

                                
                                <a href="{{url('edit_product',$prod->id) }}" class="text-info me-10 mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                    </a>
                                   
                                    <a href="#" class="text-danger" onclick="confirmation({{ $prod->id }})"  data-bs-original-title="Delete" data-bs-toggle="tooltip">
                                        <i class="fa fa-trash"></i>
                                    </a>
                               
  

                                </td>
                            </tr>

                      @endforeach
               </table>
               <div class="pagination justify-content-center mt-3">
               {{ $products->links() }}
</div>
        
           </div>
        </div>
    </div>
    <!-- JavaScript files-->
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
   
       <!-- Include SweetAlert2 -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Your custom JavaScript for delete confirmation -->
<script>
    function confirmation(productId) {
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
                window.location.href = "{{ url('destroy_product') }}/" + productId;
            }
        });
    }
</script>

<script>
        function toggleSearch() {
            var searchBox = document.getElementById("searchBox");
            searchBox.style.display = searchBox.style.display === "block" ? "none" : "block";
        }
</script>
  </body>
</html>