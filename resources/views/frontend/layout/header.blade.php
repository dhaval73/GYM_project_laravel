<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@stack('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('frontend/css/login.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/schedual.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/services.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/aboutus.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/contactus.css') }}">
</head>

<body>
    <nav class="navbar" id="navbar">
        <div class="logo">
            <img src="{{ url('frontend') }}/img/gyml.png" alt="Logo Image">
            <div class="name">
                <h3>Fitness Hub</h3>
            </div>
        </div>

        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>

        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/schedual') }}">Schedule</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>


            @if (session()->has('user_id'))
            <li class="dropdown">
                {{-- <a href="{{ url('user/logout') }}"><button class="logout-button">
                        <span class="uname">{{substr(session()->get('first_name'),0,1)}}</span>loguot</button></a> --}}
                        <button class="dropbtn">Profile</button>
                        <div class="dropdown-content">
                          <a href="{{ url('user/logout') }}">logout</a>
                          <a href="{{ url('user/editprofile') }}">Edit</a>
                          <a href="{{ url('user/changepassword') }}">Change password</a>
                        </div>
            </li>
                {{-- <li class="l_b"><a href=""><button class="logout-button">
                            <span class="uname">{{substr(session()->get('first_name'),0,1)}}</span>loguot</button></a></li> --}}
            @else
                <li class="l_b"><a href="{{ url('user/login') }}"><button class="login-button">Login</button></a>
                </li>
            @endif
        </ul>
        <!-- before mobile view  -->
        <ul class="nav-right">

            @if (session()->has('user_id'))
                <li class="dropdown">
                            <button class="dropbtn">Profile</button>
                            <div class="dropdown-content">
                                <a href="{{ url('user/logout') }}">logout</a>
                                <a href="{{ url('user/editprofile') }}">Edit</a>
                                <a href="{{ url('user/changepassword') }}">Change password</a>
                            </div>
                </li>
            @else
                <li class="l_b"><a href="{{ url('user/login') }}"><button class="login-button">Login</button></a>
                </li>
            @endif

        </ul>
    </nav>
    @if (session()->has('success'))
        <div class="pop success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('alert'))
        <div class="pop danger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session()->get('alert') }}
        </div>
    @endif

    <body>
