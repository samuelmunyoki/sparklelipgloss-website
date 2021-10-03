@if(Auth::guest())
{
   <?php
        header("Location: ".URL::to('/login'), true, 302);
        exit();
    ?>
}

@else
    
    @include('../includes/header')
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
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
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
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">SPARKLE LIPGLOSS</h1>
                    <p class="lead fw-normal text-white-50 mb-0">online boutique</p>
                </div>
            </div>
        </header>
        
        <div class="card container-fluid py-4">
                        <div class=" text-success text-center">
                            
                             @if(session()->has('success'))
                                 {{ session('success') }}
                             @endif
                            
                        </div>
                        
                            <div class="text-center">
                                @if(session()->has('orderNumber'))
                                 Your order Number is : {{ session('orderNumber') }}
                             @endif
                            </div>
                    <table class=" table table-bordered table-hover table-curved table-striped">
                          
                           <thead class="table-success">
                                <tr class="text-dark">
                                    <th>Item Name</th>
                                    <th >Price Now</th>
                                    <th >Qnt</th>
                                    <th >
                                    @if(Request::url() == '/order')
                                        Status
                                    @else
                                        Action
                                    @endif
                                    </th>    
                            </tr>
                           </thead>
                            <tbody >
                            @foreach($cartItems as $item)
                                        <tr >
                                            <td>{{ucfirst( $item ->name) }}</td>
                                            <td>Ksh. {{ $item ->price }}</td>
                                            
                                            <td>{{ $item ->quantity }}</td>
                                            @if(Request::url() == '/order')
                                                <td>ordered</td>
                                             @else
                                            <td  class="hidden">
                                               <form action="{{ route('cart.remove') }}" method="POST">
                                                   @csrf
                                                   <input type="hidden" value="{{ $item ->id }}" name="id">
                                                   <button onclick="return confirm('Remove Item from Cart?')" class="btn btn-danger">Remove</button>
                                               </form> 
                                            </td>
                                            @endif
                                        </tr>
                            @endforeach             
                            </tbody>
                        </table>
                                  
                                   <div class="d-flex justify-content-between">
                                        <form action="{{ route('cart.clear') }}" method="POST">
                                           @csrf
                                           <button onclick="return confirm('Remove all Items from Cart?')" class="btn btn-danger">Remove All</button>
                                       </form>
                                       @if(Request::url() !='/order')
                                   
                                 
                                      <form method="post" action="{{ route('cart.order') }}">
                                           @csrf
                                            <input type="hidden" value="{{ $cartItems }}" name="cartItems">
                                           <button onclick="return confirm('Order Items now?')" class="btn btn-primary">Order Now</button>
                                           
                                       </form> 
                                       @endif                                  
                                       
                                   </div>

            </div>
        
        
        
</body>
@endif