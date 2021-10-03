@include('../includes/header')   
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
@include('auth.navigation') 
        
        <body class="bg-dark">

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <span class=" text-success text-center">
                                        @if(session()->has('success'))
                                            {{ session('success') }};
                                        @endif
                                     
                                       </span>
                                    <div class="card-body">
                                       <form method="POST" class="form-control" action="{{ route('register') }}">
                                        @csrf

                                            
                                            <div class="form-floating mb-3">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <label for="name">Username</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                <label for="email">Email address</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                <label for="password">Password</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                <label for="password-confirm">Confirm Password</label>
                                            </div>
                                    
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn bg-dark text-white btn-block" id="submit" name="submit" type="submit" />
                                                <label for="submit"></label></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small "><a href="{{url('/login')}}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

    </body>
    
   @include('../includes/footer')