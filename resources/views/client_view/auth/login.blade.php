@extends('layouts.client_view')


@section('content')

    @include('client_view.components.breacrumb') 
    @if(session('loginFail') || session('loginFail') || session('NoLogin') || session('NoAccess') || session('NoActive'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...😥',
                text: '{!! addslashes(session('loginFail') ?? session('NoLogin') ?? session('NoAccess') ?? session('NoActive')) !!}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if(session('yes'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
            position: "center",
            icon: "success",
            title: "Success",
            text: '{!! addslashes(session('yes')) !!}',
            showConfirmButton: false,
            timer: 5500
            });
        </script>
    @endif
    @if(session('no'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: '{!! addslashes(session('no')) !!}',
            footer: '<a href="#">Hãy yêu cầu xác thực lại tài khoản?</a>'
            });
        </script>
    @endif
    
    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <h2>Login</h2>
                                <form method="POST" >
                                    @csrf
                                    <div class="group-input">
                                        <label for="username">Email address *</label>
                                        <input name = "email" type="email" required id="username">
                                    </div>
                                    <div class="group-input">
                                        <label for="passw">Password *</label>
                                        <input name = "password" type="password" required id="passw">
                                    </div>
                                    <div class="group-input gi-check">
                                        <div class="gi-more">
                                            <label for="save-pass">
                                                Remember Me
                                                <input name="rememberMe" type="checkbox" id="save-pass">
                                                <span class="checkmark"></span>
                                            </label>
                                            <a href="#" class="forget-pass">Forget your Password</a>
                                        </div>
                                    </div>
                                    <input type="submit" class="site-btn login-btn" value="Sign In">
                                </form>
                                <div class="switch-login">
                                    <a href="{{ route("register") }}" class="or-login">Or Create An Account</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4 justify-content-center d-flex">
                            <button type="button" onclick="window.location='{{ route('google.login') }}'" class="login-with-google-btn" >
                                Sign in with Google
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

@endsection

@section('css')
    <style>
        .login-with-google-btn {
  transition: background-color .3s, box-shadow .3s;
    
  padding: 20px 66px 20px 68px;
  border: none;
  border-radius: 3px;
  box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
  
  color: #757575;
  font-size: 14px;
  font-weight: 500;
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
  
  background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
  background-color: white;
  background-repeat: no-repeat;
  background-position: 29px 20px;
  
  &:hover {
    box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
  }
  
  &:active {
    background-color: #eeeeee;
  }
  
  &:focus {
    outline: none;
    box-shadow: 
      0 -1px 0 rgba(0, 0, 0, .04),
      0 2px 4px rgba(0, 0, 0, .25),
      0 0 0 3px #c8dafc;
  }
  
  &:disabled {
    filter: grayscale(100%);
    background-color: #ebebeb;
    box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
    cursor: not-allowed;
  }
}
    </style>
@endsection
