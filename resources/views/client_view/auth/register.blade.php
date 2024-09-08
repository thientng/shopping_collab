@extends('layouts.client_view')


@section('css')
    {{-- Bootstrap 4 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
@endsection

@section('content')

    @include('client_view.components.breacrumb')   
    
    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Đăng kí</h2>
                        <form method="POST" >
                            @csrf
                            <div class="group-input">
                                <label for="username">Tên User *</label>
                                <input name = "name" type="text" required id="username">
                                @error('name')
                                    <div class="alert-input_field">
                                        {{ $message }} * 
                                        <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="email">Email address *</label>
                                <input name = "email" type="email" required id="email">
                                @error('email')
                                    <div class="alert-input_field">
                                        {{ $message }} * 
                                        <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="passw">Password *</label>
                                <input name = "password" type="password" required id="passw">
                                @error('password')
                                    <div class="alert-input_field">
                                        {{ $message }} * 
                                        <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="passw">Nhập lại mật khẩu *</label>
                                <input name = "password_confirmation" type="password" required id="passw">
                                @error('password')
                                    <div class="alert-input_field">
                                        {{ $message }} * 
                                        <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Remember Me
                                        <input name="rememberMe" type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    {{-- <a href="#" class="forget-pass">Forget your Password</a> --}}
                                </div>
                            </div>
                            <input type="submit" class="site-btn login-btn" value="Register">
                        </form>
                        <div class="switch-login">
                            <a href="{{ route('login') }}" class="or-login">Or Login Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

@endsection
