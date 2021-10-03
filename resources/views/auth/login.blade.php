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
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
        
                                    <div class="card-body">
                                    <form method="POST" class="form-control" action="{{ route('login') }}">
                                        @csrf
                                            <div class="form-floating mb-3">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            
                                            
                                            <div class="form-floating mb-3">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            
                                            
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inputRememberPassword">Remember me</label>
                                            </div>
                                            <div class="align-items-center">
                                                <div class="d-grid"><input class="btn bg-dark text-white btn-block" id="submit" name="submit" type="submit" value="Login"/>
                                                <label for="submit"></label></div>
                            
                                                <a class="small" href=" {{route('password_reset')}}">Forgot Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ url('/register')  }}">Need an account? Sign up!</a></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>
            </div>
        </div>

    </body>
    @include('../includes/footer')