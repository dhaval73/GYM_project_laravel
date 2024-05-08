    @extends('frontend.layout.main')
    @push('title')
    Fitness Hub Contact
@endpush
    @section('main-section')
    <div class="contact-us">
        <div class="container">
            <div class="box">
                <span>Contact Us</span>
                <form action="{{url('/contact/store')}}" method="post">
                    @csrf
                    <div class="form">
                        <div>
                            <input type="text" name="name" placeholder="Name" value="{{old('name')}}">
                            @error('name')
                            <label id="fname-error" class="error" >
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="mobile_no" placeholder="Mobile Number" value="{{old('mobile_no')}}">
                            @error('mobile_no')
                            <label id="fname-error" class="error" >
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                            @error('email')
                            <label id="fname-error" class="error" >
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="subject" placeholder="Subject" value="{{old('subject')}}">
                            @error('subject')
                            <label id="fname-error" class="error" >
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                        <div>
                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" >{{old('message')}}</textarea>
                            @error('message')
                            <label id="fname-error" class="error" >
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                        <div>
                            <input type="submit" value="Send Your message">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="box">
                <div class="contact-info">
                    <!-- <h3>Conteact Us</h3> -->
                    <p><i class="fa fa-user"></i>xyz person</p>
                    <p><i class="fa fa-envelope"></i><a href="mailto:fitnesshub@xyz.com">fitnesshub@xyz.com</a>
                    </p>
                    <p><i class="fa fa-phone"></i><a href="tel:+9194088xxxxx">+91-94088xxxxx</a></p>
                    <p><i class="fa fa-map-marker"></i>Trikonbaug ,Rajkot ,Gujarat - 300001</p>

                    <div class="social">
                        <div class="footer-btn btn">
                            <a target="_blank" href="#"><i class="fab fa-whatsapp"></i></a>
                        </div>
                        <div class="footer-btn btn">
                            <a target="_blank" href="#"><i class="fa fa-phone"></i></a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ********* content end ************ -->

    <!-- ************* FOOTER ********** -->
    @endsection