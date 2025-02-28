<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    <!-- header section -->
   @include('admin.header')
    
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <h1 style="color:white;">ADD CATEGORY</h1>
         <div class="div_deg">
          
         <form action="{{url('store_banner')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
            <label for="Product_title">Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Banner Title" required>
            </div>
            <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" class="form-control" name="image" >
            </div>
            
            <input class="btn btn-primary mb-3" type ="submit" value=" Add Banner">
            
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

          
            
        </form>
        </div>
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table table-hover no-wrap product-order" data-page-size="10">
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Image</th>
                                 <th>Action</th>
                            </tr>
                            <?php

                         $menuListCount= count($menuList);

                            ?>
                       @foreach ($menuList as $menuLists)
                       <tr>
                       
                       <td>{{ $loop->index+1 }}</td>
                       <td>
                         {{ $menuLists->title }}
                      </td>
                      <td>
                      <img height="50" width="30" src="banners/{{ $menuLists->image}}">
                      </td>
                      <td>

                                
                                
                                   
                                    <a href="#" class="text-danger" onclick="confirmation({{$menuLists->id}})"   data-bs-original-title="Delete" data-bs-toggle="tooltip">
                                        <i class="fa fa-trash"></i>
                                    </a>
                               
  

                                </td>
                            </tr>

                      @endforeach

                           

        
        </div>
      </div>
    </div>
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
                window.location.href = "{{ url('destroy_banner') }}/" + categoryId;
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