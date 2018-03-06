<!DOCTYPE HTML>
<!--
  Aesthetic by gettemplates.co
  Twitter: http://twitter.com/gettemplateco
  URL: http://gettemplates.co
-->
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alumni | Our Lady of Fatima University</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
  <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="gettemplates.co" />

    <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="{{ asset('landing/css/animate.css')}}">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="{{asset('landing/css/icomoon.css')}}">
  <!-- Themify Icons-->
  <link rel="stylesheet" href="{{asset('landing/css/themify-icons.css')}}">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="{{asset('landing/css/bootstrap.css')}}">

  <!-- Magnific Popup -->
  <link rel="stylesheet" href="{{asset('landing/css/magnific-popup.css')}}">

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{asset('landing/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('landing/css/owl.theme.default.min.css')}}">

  <!-- Theme style  -->
  <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">

  <!-- Modernizr JS -->
  <script src="{{asset('landing/js/modernizr-2.6.2.min.js')}}"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

  </head>
  <body>
    
  <!-- <div class="gtco-loader"></div> -->
  
  <div id="page">
  <nav class="gtco-nav" role="navigation">
    <div class="gtco-container">
      <div class="row">
        <div class="col-md-12 text-right gtco-contact">
          <ul class="">
            
            <li><a href="https://twitter.com/fatimaphoenix?lang=en"><i class="ti-twitter-alt"></i> </a></li>
            <li><a href="#"><i class="icon-mail2"></i></a></li>
            <li><a href="https://www.facebook.com/fatima.university"><i class="ti-facebook"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <div id="gtco-logo"><a href=""><h2 style="color: white" class="animate-box" data-animate-effect="fadeInUp"><img src ="{{asset('images/logotrans.png')}}" width="50" height="50"> ALUMNI AFFAIRS</h2> </a></div>
        </div>
        <div class="col-xs-8 text-right menu-1">
          <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#gtco-portfolio">Discover</a></li>
            <li><a href="#gtco-features">About</a></li>
            
            <!-- <li><a href="/register">Register</a></li> -->
          </ul>
        </div>
      </div>
      
    </div>
  </nav>

  <header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url({{asset('images/olfupamp.jpg')}}">
    <div class="overlay"></div>
    <div class="gtco-container">
      <div class="row">
        <div class="col-md-12 col-md-offset-0 text-left">
          <div class="display-t">
            <div class="display-tc">
              <h1 class="animate-box" data-animate-effect="fadeInUp"> Our Lady of Fatima University</h1>
              <h2 class="animate-box" data-animate-effect="fadeInUp"><i>Veritas et Misericordias!</i></h2>
               @if (Auth::guest())
              <p class="animate-box" data-animate-effect="fadeInUp"><a href="{{route('login')}}" class="btn btn-white btn-lg btn-outline">Sign In</a></p>
              @else
              <p class="animate-box" data-animate-effect="fadeInUp"><a href="{{route('login')}}" class="btn btn-white btn-lg btn-outline">{{ Auth::user()->name }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</a><a href="{{route('user.logout')}}" class="btn btn-white btn-lg btn-outline">Log out</a></p>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="gtco-features-3">
    <div class="gtco-container">
      <div class="gtco-flex">
        <div class="feature feature-1 animate-box" data-animate-effect="fadeInUp">
          <div class="feature-inner">
            <span class="icon">
              <i class="ti-eye"></i>
            </span>
            <h3>Vision</h3>
            <p>To be the central networking office for students' employment before and after graduation. </p>
          </div>
        </div>
        <div class="feature feature-2 animate-box" data-animate-effect="fadeInUp">
          <div class="feature-inner">
            <span class="icon">
              <i class="ti-crown"></i>
            </span>
            <h3>ACHIEVER</h3>
            <p>Aspires to do his best <br> Credible and Compassionate <br> Hardworking and Honorable <br> Inspiration To Others <br> Efficiently Entrepreneurial and Employable <br> Visionary <br> Ethical and has Excellent Work Habits <br> Responsible</p>
          </div>
        </div>
        <div class="feature feature-3 animate-box" data-animate-effect="fadeInUp">
          <div class="feature-inner">
            <span class="icon">
              <i class="ti-target"></i>
            </span>
            <h3>Mission</h3>
            <p> To continually dedicate ourselves in providing our students and alumni the necessary skills and resources they need that will lead them achieve fulfilling careers. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div id="gtco-features">
<!--     <div class="gtco-container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box"><img src="{{asset('images/logo.jpg')}}">
          <h2>Our Lady of Fatima University</h2>
        </div>
      </div>
      </div> -->
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="ti-user"></i>
            </span>
            <h3>Career Counseling</h3>
            <small class="block"> Decision-making is a process that involves introspect, self-study, planning and time. Students need to develop their ability to make good decisions, clarify their understanding of themselves, and enrich their knowledge of work possibilities in the world. Career counselling is provided to further help the students in assessing and evaluating their short and long-term goals.</small> 
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="ti-pencil-alt"></i>
            </span>
            <h3>Seminars and Workshops</h3>
            <small class="block">It is ensured that all graduating students are provided with seminars and workshops that would orient them on the knowledge and skills they need as they enter the world of work. Technical skills for job hunting like resume writing, application-writing, interview skills are the emphasis of such workshops. Competent and highly-skilled speakers and facilitators are invited to provide such knowledge.</small>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="ti-bag"></i>
            </span>
            <h3>Job Fairs and Events</h3>
            <small class="block">Job fairs are sponsored by the office to enhance career opportunities and employment connections between qualified students and employers. Through these activities, students are helped to identify and obtain full-time employment opportunities. It allows students and employers to meet and discuss specific details on current job openings.</small>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="ti-hand-open"></i>
            </span>
            <h3>Placement Assistance</h3>
            <small class="block">Helps graduating students and even alumni in finding jobs that will help them improve their socio-economic status through the pre-employment seminars and job fairs being conducted.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="gtco-portfolio" class="gtco-section">
    <div class="gtco-container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
          <h2>What's New?</h2>
          <p>Daily Events . Stories . Spotlights</p>
        </div>
      </div>

      <div class="row row-pb-md">
        <div class="col-md-12">
          <ul id="gtco-portfolio-list">
              @foreach($posts as $post)
            <li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset('images/'. $post->image)}}); "> 
              <a href="{{route('login')}}" class="color-1">
                <div class="case-studies-summary">
                  <span>{{ $post->title }}</span>
                  <h2>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "....." : "" }}</h2>
                </div>
              </a>
            </li>
            @endforeach
          
          
          </ul>   
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center animate-box">
          <a href="{{route('login')}}" class="btn btn-white btn-outline btn-lg btn-block">See More</a>
        </div>
      </div>

      
    </div>
  </div>

  <div id="gtco-counter" class="gtco-section">
    <div class="gtco-container">

  <div id="gtco-products">
    <div class="gtco-container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
          <h2>OLFU Partners</h2>
          <p>Discounts Using your Alumni Card</p>
        </div>
        </div>
      </div>
      <div class="row animate-box">
        <div class="owl-carousel owl-carousel-carousel">
           @foreach($partners as $partner)
          <div class="item">
            @if($partner->image == '')
            @else
            <a href="{{route('login')}}"><img src="{{ asset('images/'. $partner->image)}}"></a>
            @endif
            <p>{{ substr($partner->description, 0, 50) }}{{ strlen($partner->description) > 50 ? "....." : "" }}</p>
          </div>
           @endforeach
         
        </div>
      </div>
    </div>
  </div>

  

 <!--  <div id="gtco-subscribe">
    <div class="gtco-container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
          <h2>Contact Us</h2>
          <p>Our Lady of Fatima University MacArthur Highway, Marulas, Valenzuela City.</p>
        </div>
      </div>
      <div class="row animate-box">
        <div class="col-md-12">
          <form class="form-inline" action="{{ url('contactus')}}" method="POST">
            {{csrf_field()}}
            <div class="col-md-4 col-sm-4">
              <div class="form-group">
                <label for="subject" class="sr-only">Full Name</label>
                <input type="text" name="subject" class="form-control" placeholder="Full Name">
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-8 col-sm-4">
              <div class="form-group">
                <label for="message" class="sr-only">Message</label>
               <input type="text" class="form-control" name="message" placeholder="Message">
              
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <button type="submit" class="btn btn-default btn-block">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
 -->
  <footer id="gtco-footer" role="contentinfo">
    <div class="gtco-container">
      <div class="row row-p b-md">

        <!-- <div class="col-md-6">
          <div class="gtco-widget">
            <h3>About Us</h3>
            <p>OLFU - HOME OF TOPNOTCHERS. A premier educational institution in the country particularly in the field of allied health, science and technology.<a href="http://fatima.edu.ph/"></p>
          </div>
        </div>
 -->
        <div class="col-md-12 col-md-push-0">
          <div class="gtco-widget">
            <p class="pull-right"><h3>Quik Links</h3></div>
             <div class="gtco-widget">
            <ul class="gtco-footer-links">
              <div class="col-md-2 col-sm-2">
              <li><a href="/">Home</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="#gtco-portfolio">Discover</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="#gtco-features">About Us</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="#gtco-subscribes">Contact Us</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="#">Terms of services</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="#">Privacy Policy</a></li></div>
            </ul>
          </div>
        </div>
        </div>


      </div>

      <div class="row copyright">
        <div class="col-md-12">
          <p class="pull-left">
            <small class="block">&copy; Alumni | Our Lady of Fatima University. All Rights Reserved 2018.</small> 
          </p>
        </div>
      </div>

    </div>
  </footer>
  </div>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>
  
  <!-- jQuery -->
  <script src="{{asset('landing/js/jquery.min.js')}}"></script>
  <!-- jQuery Easing -->
<script src="{{asset('landing/js/jquery.easing.1.3.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
  <!-- Waypoints -->
  <script src="{{asset('landing/js/jquery.waypoints.min.js')}}"></script>
  <!-- Carousel -->
  <script src="{{asset('landing/js/owl.carousel.min.js')}}"></script>
  <!-- countTo -->
  <script src="{{asset('landing/js/jquery.countTo.js')}}"></script>
  <!-- Magnific Popup -->
  <script src="{{asset('landing/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('landing/js/magnific-popup-options.js')}}"></script>
  <!-- Main -->
  <script src="{{asset('landing/js/main.js')}}"></script>

  </body>
</html>

