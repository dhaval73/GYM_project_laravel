   
    @extends('frontend.layout.main')
    @push('title')
    Fitness Hub About Us
@endpush
    @section('main-section')
    <!-- ***********  ******* ********** -->
    <!-- ***********  about ********** -->
    <!-- ***********  ******* ********** -->

    <div class="about-container">
        <div class="about">
            <h2>About Us</h2>
        </div>
        <div class="about-cont">
            <div class="about-img">
                <img src="{{url("frontend/")}}/img/about1.jpg" alt="">
                <img src="{{url("frontend/")}}/img/about2.jpg" alt="">
            </div>
            <div>
                <h2>Know About Fitness Hub</h2>
                <p>Fitness Hub is a premier gym located in the heart of Rajkot, Gujarat. Our mission is to provide a
                    welcoming and inclusive environment where members can achieve their fitness goals and live a healthy
                    lifestyle. With state-of-the-art equipment and a variety of classes, including strength training,
                    cardio, yoga, and more, Fitness Hub has something for everyone. Our knowledgeable staff is always
                    available to assist with your fitness journey and ensure a safe and effective workout. Whether
                    you're a beginner or a seasoned athlete, join us at Fitness Hub and start reaching your fitness
                    goals today.</p>
            </div>

        </div>
    </div>



    <!-- ********* about end ************ -->













    <!-- ************* FOOTER ********** -->

    @endsection