@extends('frontend.layout.main')
@push('title')
    Fitness Hub 
@endpush
@section('main-section')
<!-- **********************************
********** Regester / Edit Profile *****************
********************************** -->

@if (@isset($user))
@php
$isEditProfile=true;
@endphp  
@else
@php
$isEditProfile=false;
@endphp  
@endif


<div class="register-cont">
    <div class="form">
        <div class="form-container">
            <form id="register" action="{{ $isEditProfile ? url('user/editprofile/') : url('/user/registartion') }}" method="post">
                @csrf
                <h2>{{ $isEditProfile ? 'Edit Profile' : 'Registration' }}</h2>
                <div class="inputBox">
                    <input type="text" name='first_name' id='first_name' value="{{ $isEditProfile ? $user->first_name : old('first_name') }}" required>
                    <span>first name</span>
                    <i></i>
                </div>
                @error('first_name')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                <div class="inputBox">
                    <input type="text" name='last_name' id='lname' required value="{{ $isEditProfile ? $user->last_name : old('last_name') }}">
                    <span>Last name</span>
                    <i></i>
                </div>
                @error('last_name')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                <div class="inputBox">
                    <input type="date" name='dob' id='dob' required value="{{ $isEditProfile ? $user->dob : old('dob') }}">
                    <span>Date of Birth</span>
                    <i></i>
                </div>
                @error('dob')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                <div class="inputBox">
                    <input type="text" name='mobile_no' id='mo_no' required value="{{ $isEditProfile ? $user->mobile_no : old('mobile_no') }}">
                    <span>Mobile Number</span>
                    <i></i>
                </div>
                @error('mobile_no')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                @if(!$isEditProfile)
                <div class="inputBox">
                    <input type="email" name="email" id="email"  required value="{{old('email')}}">
                    <span>Email Id</span>
                    <i></i>
                </div>
                @error('email')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                @endif
                @if(!$isEditProfile)
                <div class="inputBox">
                    <input type="password" name="password" id="pass" required value="{{old('password')}}">
                    <span>password</span>
                    <i></i>
                </div>
                @error('password')
                <label id="fname-error" class="error" >
                    {{$message}}
                </label>
                @enderror
                @endif
                @if(!$isEditProfile)
                <div class="inputBox">
                    <input type="password" name="confirmation_password" id="pass" required value="{{old('password')}}">
                    <span>confirmation password</span>
                        <i></i>
                    </div>
                    @error('confirmation_password')
                    <label id="fname-error" class="error" >
                        {{$message}}
                    </label>
                    @enderror
                    @endif
                    <button class="button"><span>
                        {{ $isEditProfile ? 'CHANGE' : 'REGISTER' }}
                        
                    </span></button>
                </form>
            </div>
        </div>
    </div>

    <!-- **********************************
  ********** footer *****************
  ********************************** -->
@endsection