                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/')}}">Home</a></li>

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
                            <i class="bi-cart-fill me-1"></i>
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
       
       
         <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">SPARKLE LIPGLOSS</h1>
                    <p class="lead fw-normal text-white-50 mb-0">online boutique</p>
                </div>
            </div>      
       