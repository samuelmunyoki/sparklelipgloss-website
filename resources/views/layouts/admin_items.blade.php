@if(Auth::guest() || auth()->user()->role==="client")
{
   <?php
        header("Location: ".URL::to('/home'), true, 302);
        exit();
    ?>
    
}
@else
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SparkleLipgloss Admin</title>

        
            <script src="{{ url('/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{ url('/js/scripts.js') }}"></script>
            <script src="{{ url('/js/remove.items.js') }}"></script>
             <script src="{{ url('/js/all.min.js') }}"></script>
            <link href="{{ url('/css/styles.css') }}" rel="stylesheet" >
            <link href="{{ url('/css/all.css') }}" rel="stylesheet" />
            <link href="{{ url('/css/bootstrap-icons.css') }}" rel="stylesheet" />
            <link href="{{ url('/css/adminstyles.css') }}" rel="stylesheet" />
    
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url('/admin/') }}">Admin Page</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="get" action="{{ route('adminsearch') }}">
               @csrf
                <div class="input-group">
                    <input class="form-control" name="search_key" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                 
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="{{ route('adminhome') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="{{ url('/home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Website
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('adminnew-arrivals') }}">New Arrivals</a>
                                    <a class="nav-link" href="{{ route('adminpopular') }}">Popular Products</a>
                                    <a class="nav-link" href="{{ route('admincreate') }}">Add Item</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ url('/userlogin') }}">Login</a>
                                            <a class="nav-link" href="{{ url('/user-registration') }}">Register</a>
                                           
                                        </nav>
                                    </div>

                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Graphs</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                      
                      
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{auth()->user()->name}}
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       @if(Request::is('admin/new-arrivals'))
                           <h1 class="mt-4">New Arrivals</h1>
                       @endif
                       @if(Request::is('admin/popular'))
                           <h1 class="mt-4">Popular</h1>
                       @endif
                       @if(Request::is('admin/search'))
                           <h1 class="mt-4 text-success">Search Results</h1>
                         
                       @endif
                       
                     
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Items Record</li>
                        </ol>
                        <div class="text-center text-success">
                            @if(session()->has('success'))
                                {{ session('success') }}
                            @endif
                        </div>
                        <div class="card ">
                           
                            <div class="card-header">
                                <i class="fas fa-table me-1 "></i>
                                Products Data Table
                            </div>
                                @yield('content')
                        </div>
                         <div class="d-flex justify-content-center page-item py-2">
                       {{  $items->onEachSide(3)->links('pagination::bootstrap-4') }}
      
                       
                        </div>
                    </div>
                             
                      @include('../../includes/footer')
                </main>

            </div>
        </div>


    </body>
 
</html>
@endif
