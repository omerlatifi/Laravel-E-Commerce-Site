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
          <h1 style="color:white;">ADD CATEGORY</h1>
         <div class="div_deg">
          
        <form action="{{url('add_category')}}" method ="POST">
          @csrf
            <div>
              <input type ="text" name="category">
            
            <input class="btn btn-primary" type ="submit" value=" Add Category">
            
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
                                <th>Name</th>
                        
                                 <th>Action</th>
                            </tr>
                            <?php

                         $menuListCount= count($menuList);

                            ?>
                       @foreach ($menuList as $menuLists)
                       <tr>
                       
                       <td>{{ $loop->index+1 }}</td>
                       <td>
                         {{ $menuLists->category_name }}
                      </td>
                      <td>

                                
                                <a href="{{url('edit_category',$menuLists->id) }}" class="text-info me-10 mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                    </a>
                                   
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