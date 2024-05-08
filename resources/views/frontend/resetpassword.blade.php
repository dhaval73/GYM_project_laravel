
@extends('frontend.layout.main')
@push('title')
    Fitness Hub Reset Password
@endpush
@section('main-section')

<div class="login-cont">
    <div class="form">
        <div class="form-container">
            <form action="{{ $forgotpassword ? url('user/forgotpassword') : url('/user/changepassword')  }}" method="post" id="login">
                @csrf
                <h2>{{ $forgotpassword ? 'Reset Password' : 'Change Password' }}</h2>
                @if ($forgotpassword)
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
                @else
                <div class="inputBox">
                    <input type="password" name='current_password' id='pass' required>
                    <span>Current Password</span>
                    <i></i>
                </div>
                @error('current_password')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                @endif
                <div class="inputBox">
                    <input type="password" name='new_password' id='pass' required>
                    <span>New Password</span>
                    <i></i>
                </div>
                @error('new_password')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                <div class="inputBox">
                    <input type="password" name='confirm_new_password' id='pass' required>
                    <span>Confirm New Password</span>
                    <i></i>
                </div>
                @error('confirm_new_password')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                <div class="links">
                    @if ($forgotpassword)
                    <a href="{{url("user/login")}}">Login</a> 
                    <a href="{{url("user/registartion")}}">SignUp</a>
                    @else
                    <a href="{{url("user/forgotpassword")}}">Forgot Password ?</a> 
                    @endif
                </div>
                @if ($forgotpassword)
                <button class="button"><span>Reset</span></button>
                @else
                <button class="button"><span>Change</span></button>
                @endif
        </div>
        </form>
    </div>
</div>
<!-- **********************************
********** footer *****************
********************************** -->
@endsection