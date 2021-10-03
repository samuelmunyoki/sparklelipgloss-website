@include('includes/header')
   
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-success " href="#!" id="time">Time
                    <script type="text/javascript">
                        function showTime(){
                            var date = new Date(),
                                utc =new Date(
                                date.getFullYear(),
                                date.getMonth(),
                                date.getDate(),
                                date.getHours(),
                                date.getMinutes(),
                                date.getSeconds()
                            
                            );
                            
                            document.getElementById('time').innerHTML = utc.toLocaleTimeString();
                         }
                    
                        setInterval(showTime, 1000);

                    </script>
                
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/')}}">Home</a></li>
                        @if(Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        @endif
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/')}}">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="{{ url('/popular')}}">Popular Items</a></li>
                                <li><a class="dropdown-item" href="{{ url('/new_arrivals')}}">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form method="GET"  class="d-flex" action="{{ route('cart.list') }}">
                    @csrf
                        <div class="p-6">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-half me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{ Cart::getTotalQuantity() }}</span>
                        </button>
                        @if(!Auth::guest())
                                <a href="{{ url('/logout') }}" class="btn btn-outline-dark">Logout</a>
                            @if(auth()->user()->role==='admin')
                                <a href="{{ url('/admin/') }}" class="btn btn-dark">Back</a>
                            @endif
                        @endif
                                                 
                        </div>

                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">SPARKLE LIPGLOSS</h1>
                    <p class="lead fw-normal text-white-50 mb-0">online boutique</p>
                </div>
            </div>
        </header>
        <!-- Section-->
 
    <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <img  class="img-fluid rounded mb-4 mb-lg-0" src="{{ url('/images/image.jpeg') }}" alt="owner's photo" />
                    </div>
                </div>
                </div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Online shopping Boutique</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                    <a class="btn bg-dark text-white" href="{{ url('/home') }}">Shop Now</a>
                </div>
            </div>
    </div>
      

      
<!-- Page Content-->
        <div class="container px-4 px-lg-5">
          
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Products</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                        </div>
                        <div class="card-footer"><a class="btn bg-dark text-white" href="#!">View</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Services</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                        </div>
                        <div class="card-footer"><a class="btn bg-dark text-white" href="#!">View</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">About</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                        </div>
                        <div class="card-footer"><a class="btn bg-dark text-white" href="#!">View</a></div>
                    </div>
                </div>
            </div>
        </div>      
        <!-- Footer-->
  @include('includes/footer')