@extends('frontend.layout.main')
@push('title')
    Fitness Hub
@endpush
@section('main-section')
    


   {{-- ***********  HOME ********** --> --}}

  <div class="home" id="home">
    <div class="home-container">
      <div class="home-heding">
        WELCOME TO <b>FITNESS HUB</b>
      </div>
      <span>Welcome to FITNESS HUB, Rajkot's premier fitness center. We offer a variety of classes, personal training
        programs and state-of-the-art equipment. Our knowledgeable trainers are dedicated to helping you reach your
        fitness goals. Join us today and experience the best in fitness!</span>
      <div>
        <button><a href="{{url('/contact')}}">Let's Join</a></button>
      </div>
    </div>
  </div>
  <!-- ********* END HOME ************ -->
  <!-- ********* END schedual ************ -->
  <div class="schedual-container">
    <h2>Gym Schedule</h2>
    <section id="schedule">
      <table>
        <tr>
          <th>Time</th>
          <td>Monday</td>
        </tr>
        <tr>
          <th>6:00 AM</th>
          <td class="class">Yoga</td>
        </tr>
        <tr>
          <th>9:00 AM</th>
          <td class="class">Cardio Blast</td>
        </tr>
        <tr>
          <th>12:00 PM</th>
          <td class="class">Strength Training</td>
        </tr>
        <tr>
          <th>5:00 PM</th>
          <td class="class">Cardio Blast</td>
        </tr>
      </table>

      <table>
        <tr>
          <th>Time</th>
          <td>Tuesday</td>
        </tr>
        <tr>
          <th>6:00 AM</th>
          <td class="class">Bootcamp</td>
        </tr>
        <tr>
          <th>9:00 AM</th>
          <td class="class">Pilates</td>
        </tr>
        <tr>
          <th>12:00 PM</th>
          <td class="class">Yoga</td>
        </tr>
        <tr>
          <th>5:00 PM</th>
          <td class="class">Pilates</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Time</th>

          <td>Wednesday</td>
        </tr>
        <tr>
          <th>6:00 AM</th>
          <td class="class">Strength Training</td>
        </tr>
        <tr>
          <th>9:00 AM</th>
          <td class="class">Cardio Blast</td>
        </tr>
        <tr>
          <th>12:00 PM</th>
          <td class="class">Cardio Blast</td>
        </tr>
        <tr>
          <th>5:00 PM</th>
          <td class="class">Pilates</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Time</th>
          <td>Thursday</td>
        </tr>
        <tr>
          <th>6:00 AM</th>
          <td class="class">Yoga</td>
        </tr>
        <tr>
          <th>9:00 AM</th>
          <td class="class">Pilates</td>
        </tr>
        <th>12:00 PM</th>
        <td class="class">Strength Training</td>
        </tr>
        <tr>
          <th>5:00 PM</th>
          <td class="class">Pilates</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Time</th>
          <td>Friday</td>
        </tr>
        <tr>
          <th>6:00 AM</th>
          <td class="class">Yoga</td>
        </tr>
        <tr>
          <th>9:00 AM</th>
          <td class="class">Zumba</td>
        </tr>
        <tr>
          <th>12:00 PM</th>
          <td class="class">YogaPilates
        <tr>
          <th>5:00 PM</th>
          <td class="class">Zumba</td>
        </tr>
      </table>

    </section>

  </div>

  <!-- ********* END schedual ************ -->
  <!-- ********* services start ************ -->
  <section id="services">
    <div class="container">
      <h2 class="section-title">Our Services at Fitness Hub</h2>
      <div class="services-row">
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-dumbbell"></i>
          </div>
          <h3 class="service-title">Strength Training</h3>
          <p class="service-desc">
            At Fitness Hub, our strength training program will help you build strength and achieve your
            fitness goals. Our certified trainers will guide you through proper technique and personalized
            workout plans to maximize your results.
          </p>
        </div>
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-people-carry"></i>
          </div>
          <h3 class="service-title">Group Fitness Classes</h3>
          <p class="service-desc">
            Join our fun and energetic group fitness classes led by certified trainers at Fitness Hub. We
            offer a variety of classes such as yoga, Pilates, cardio, and more. With our group fitness
            classes, you'll get a great workout and meet new friends who share your love for fitness.
          </p>
        </div>
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-user-md"></i>
          </div>
          <h3 class="service-title">Personal Training</h3>
          <p class="service-desc">
            Get one-on-one guidance from our experienced personal trainers at Fitness Hub. They will design
            a personalized workout plan to help you reach your fitness goals. Whether you're looking to lose
            weight, build muscle, or just improve your overall fitness, our personal trainers will help you
            get there.
          </p>
        </div>
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-apple-alt"></i>
          </div>
          <h3 class="service-title">Health and Nutrition Coaching</h3>
          <p class="service-desc">
            Our certified nutritionists at Fitness Hub will work with you to create a healthy eating plan
            that fits your lifestyle and helps you reach your goals. With proper nutrition, you'll have more
            energy, feel better, and be on your way to reaching your fitness goals.
          </p>
        </div>
        <!-- </div>
        <div class="services-row"> -->
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-child"></i>
          </div>
          <h3 class="service-title">Child Care Services</h3>
          <p class="service-desc">
            Bring your little ones along for the ride at Fitness Hub! Our child care center is staffed by
            friendly and experienced caretakers to ensure your children are safe and entertained while you
            workout. With our child care services, you can focus on your workout and know that your children
            are in good hands.
          </p>
        </div>
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-swimming-pool"></i>
          </div>
          <h3 class="service-title">Swimming Pool</h3>
          <p class="service-desc">
            Take a dip in our crystal-clear swimming pool at Fitness Hub. Our pool is perfect for a
            low-impact workout, or just a refreshing break from your routine. With lifeguards on duty, you
            can swim with confidence and enjoy the many benefits of water exercise.
          </p>
        </div>
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-medkit"></i>
          </div>
          <h3 class="service-title">Physical Therapy</h3>
          <p class="service-desc">
            If you're recovering from an injury or just need some extra support, our physical therapy
            services at Fitness Hub can help. Our physical therapists will work with you to develop a
            rehabilitation plan tailored to your needs, helping you get back to your active lifestyle as
            quickly and safely as possible.
          </p>
        </div>
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-running"></i>
          </div>
          <h3 class="service-title">Outdoor Activities</h3>
          <p class="service-desc">
            Get outside and enjoy the beautiful weather with our outdoor activities at Fitness Hub. We offer
            a variety of activities such as hiking, running, and cycling to help you stay active and enjoy
            the great outdoors. With our outdoor activities, you'll get a workout and take in some fresh air
            at the same time.
          </p>
        </div>
      </div>

    </div>
  </section>
  <!-- ********* services end ************ -->
  <!-- ********* about start ************ -->
  <div class="about-container">
    <div class="about">
      <h2>About Us</h2>
    </div>
    <div class="about-cont">
      <div class="about-img">
        <img src="{{url('frontend/img/about2.jpg')}}" alt="">
        <img src="{{url('frontend/img/about1.jpg')}}" alt="">
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
 
 

