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
                <h1 style="color:white;">EDIT CATEGORY</h1>
                       <div class="div_deg">
          


         <form action="{{ url('update_category',$menuList->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category_name">Category Name:</label>
            <input type="text" class="form-control" name="category_name" value="{{ $menuList->category_name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>

        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
           @endif  
           @if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif



           </div>
</form>
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
    
    

  </body>
</html>