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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
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
        <section class="py-5">
                    <div class=" text-success text-center">
                            
                             @if(session()->has('success'))
                                 {{ session('success') }}
                             @endif
                        </div>
                        
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach($items as $item)
                    
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                @if($item->prod_new == 1)
                                New Arrival
                                @else
                                Popular
                                @endif
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top responsive" src="{{ url('/images/image.jpeg') }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ ucfirst($item->prod_name)  }}</h5>
                                    <!-- Product reviews-->
                                    <?php
                                    $fill_stars = floor($item->prod_rating);
                                    $half = $item->prod_rating - $fill_stars;
                                    ?>
                                    <div class="d-flex justify-content-center small  mb-2">
                                       <div class="text-black">Rating: </div>
                                        @for($i=1;  $fill_stars >= $i ; $i++ )
    
                                                <div class="fa fa-star text-warning"></div>
                                                
                                                
                                          @endfor 
                                          @if($half>0)
                                              <div class="fa fa-star-half text-warning"></div>
                                          @endif
                                        
                                    </div>
                                    <!-- Product price-->
                                    @if($item->prod_prev_price>0)
                                    <span class="text-muted text-decoration-line-through">Ksh.{{$item->prod_prev_price}}</span> Ksh.
                                    {{ $item->prod_price_now }}
                                    
                                    @else
                                    Ksh.{{ $item->prod_price_now }}
                                    @endif
                                    
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                               <form action="{{ route('cart.store')  }}" method="POST">
                                  @csrf
                                      <input type="hidden" value="{{ $item -> prod_id }}" name="id">
                                      <input type="hidden" value="{{ $item -> prod_name }}" name="name">
                                      <input type="hidden" value="{{ $item -> prod_price_now }}" name="price">
                                      <input type="hidden" value="{{ $item -> prod_image_name }}" name="image">
                                      <input type="hidden" value="1" name="quantity">
                                   <div class="text-center"><button class="btn btn-outline-dark mt-auto">Add to cart</button></div>
                               </form>
                                
                            </div>
                        </div>
                    </div>
                    
                    @endforeach

                </div>

                   <div class="d-flex justify-content-center page-item">
                       {{  $items->onEachSide(3)->links('pagination::bootstrap-4') }}
      
                       
                   </div>
                   
            </div>
 
        </section>
        <!-- Footer-->
  @include('includes/footer')