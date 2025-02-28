<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{Url('/')}}">
        <img src="{{ asset('images/Sweety.png') }}" alt="Sweety Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('shop')}}">
                Shop
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="#">
                Category
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('help')}}">Help & Service</a>
            </li>
          </ul>
          @if (Route::has('login'))
          @auth

          <div class="user_option">

          
          <form method="POST" action="{{ route('logout') }}" style="margin-right:30px">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" >
                                <i class="fa fa-sign-out-alt"></i> Logout
                            </button>
          </form>
            <a href="{{url('my_cart')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              {{$count}}
            </a>
            </form>
            <a class="nav-link" href="{{url('my_order')}}">
              <span>My Order</span>
            </a>

            <div class="search-container">
            <form action="{{ url('search') }}" method="GET" class="search-input" id="searchBox">
                <input  name="search" placeholder="Search Product..." required>
                <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa fa-search"></i>
                </button>
            </form>
            </div>

        </div>


          @else
          <div class="user_option">
            <a href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                Registration
              </span>
            </a>
            </div>
            @endif
            @endauth

        </div>
      </nav>
    </header>
    