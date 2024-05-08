
    @extends('frontend.layout.main')

    @section('main-section')
    
    @push('title')
    Fitness Hub login
@endpush
    <div class="login-cont">
        <div class="form">
            <div class="form-container">
                <form action="{{url('/user/login')}}" method="post" id="login">
                    @csrf
                    <h2>Login</h2>
                    <div class="inputBox">
                        <input type="email" name='email' id='email' required>
                        <span>Email</span>
                        <i></i>
                    </div>
                    @error('email')
                    <label id="fname-error" class="error" >
                        {{$message}}
                    </label>
                    @enderror
                    <div class="inputBox">
                        <input type="password" name='password' id='pass' required>
                        <span>Password</span>
                        <i></i>
                    </div>
                    @error('password')
                    <label id="fname-error" class="error" >
                        {{$message}}
                    </label>
                    @enderror
                    <div class="links">
                        <a href="{{url('/user/forgotpassword')}}">Forgot Password ?</a> 
                        <a href="{{url("user/registartion")}}">SignUp</a>
                    </div>
                    <!-- <input type="submit" value="LOGIN"> -->
                    <button class="button"><span>LOGIN</span></button>
            </div>
            </form>
        </div>
    </div>
    <!-- **********************************
  ********** footer *****************
  ********************************** -->
@endsection