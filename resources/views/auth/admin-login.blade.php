<!DOCTYPE HTML>
<!--
  Aesthetic by gettemplates.co
  Twitter: http://twitter.com/gettemplateco
  URL: http://gettemplates.co
-->
<html>
  <head>
  <meta charset="utf-8">
  <title>Alumni | Our Lady of Fatima University</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
          <div id="gtco-logo"><a href="#"><img src ="{{asset('images/logotrans.png')}}" width="50" height="50"> Alumni Affairs <em>.</em></a></div>
        </div>
        <div class="col-xs-8 text-right menu-1">
          <ul>
            <li class="active"><a href="/">Home</a></li>
          </ul><br><br>
        </div>
        <h1 data-animate-effect="fadeInUp" style="color: white"> Our Lady of Fatima University</h1>
        <div class="col-md-5 col-md-offset-7">
           <label style="color: white" width="50" height="50">ADMIN LOGIN</label>
             <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}
                          
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>

                            
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Email" style="background-color: white">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           

                          
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Enter Password" style="background-color: white">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                         
                        </div>


                        <div class="form-group">
                       
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                         
                        </div>
                      </div>
                    </form>

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
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>


<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                          
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

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
       <!--  <div class="col-md-12 col-md-push-0">
          <div class="gtco-widget">
            <p class="pull-right"><h3>Quik Links</h3></div>
             <div class="gtco-widget">
            <ul class="gtco-footer-links">
              <div class="col-md-2 col-sm-2">
              <li><a href="/">Home</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="/#gtco-portfolio">Discover</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="/#gtco-features">About Us</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="/#gtco-subscribes">Contact Us</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="#">Terms of services</a></li></div>
              <div class="col-md-2 col-sm-2">
              <li><a href="#">Privacy Policy</a></li></div>
            </ul>
          </div>
        </div>
        </div>


      </div> -->

     <!--  <div class="row copyright">
        <div class="col-md-12">
          <p class="pull-left">
            <small class="block">&copy; Alumni|Our Lady of Fatima University. All Rights Reserved 2018.</small> 
          </p>
        </div>
      </div> -->

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







