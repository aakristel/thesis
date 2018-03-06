<!-- <!DOCTYPE HTML> -->
<!--
  Aesthetic by gettemplates.co
  Twitter: http://twitter.com/gettemplateco
  URL: http://gettemplates.co
-->
<!-- <html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alumni | Our Lady of Fatima University</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
  <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="gettemplates.co" />

    <!-- Facebook and Twitter integration -->
<!--   <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" /> --> -->

  <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->
  
  <!-- Animate.css -->
<!--   <link rel="stylesheet" href="{{ asset('landing/css/animate.css')}}"> -->
  <!-- Icomoon Icon Fonts-->
  <!-- <link rel="stylesheet" href="{{asset('landing/css/icomoon.css')}}"> -->
  <!-- Themify Icons-->
<!--   <link rel="stylesheet" href="{{asset('landing/css/themify-icons.css')}}"> -->
  <!-- Bootstrap  -->
  <!-- <link rel="stylesheet" href="{{asset('landing/css/bootstrap.css')}}"> -->

  <!-- Magnific Popup -->
<!--   <link rel="stylesheet" href="{{asset('landing/css/magnific-popup.css')}}"> -->

  <!-- Owl Carousel  -->
 <!--  <link rel="stylesheet" href="{{asset('landing/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('landing/css/owl.theme.default.min.css')}}"> -->

  <!-- Theme style  -->
 <!--  <link rel="stylesheet" href="{{asset('landing/css/style.css')}}"> -->

  <!-- Modernizr JS -->
<!--   <script src="{{asset('landing/js/modernizr-2.6.2.min.js')}}"></script> -->
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->
<!-- 
  </head>
  <body> -->
    
  <!-- <div class="gtco-loader"></div> -->
  
 <!--  <div id="page">
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
          <div id="gtco-logo"><a href="#"><img src ="{{asset('images/logotrans.png')}}" width="50" height="50"> OLFU <em>.</em></a></div>
        </div>
        <div class="col-xs-8 text-right menu-1">
          <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/#gtco-portfolio">Discover</a></li>
            <li><a href="/#gtco-features">About</a></li>
            <li><a href="/#gtco-subscribe">Contact</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
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
              <h1 class="animate-box" data-animate-effect="fadeInUp"> Alumni Affairs</h1>
              <h2 class="animate-box" data-animate-effect="fadeInUp"><i>Veritas et Misericordias!</i></h2>
              <p class="animate-box" data-animate-effect="fadeInUp"><a href="{{route('login')}}" class="btn btn-white btn-lg btn-outline">Sign in</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  @include('flash::message')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label"><i class="fas fa-reply"></i>First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Lastname:</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" required placeholder="Enter your Lastname">

                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender:</label>

                            <div class="col-md-6">
                               <select name="gender" class="form-control">
                                 <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                               </select>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="campus" class="col-md-4 control-label">Campus</label>

                            <div class="col-md-6">
                               <input id="campus" type="text" class="form-control" name="campus" required placeholder="Enter your Campus">
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="yeargrad" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Year Graduated</label>

                            <div class="col-md-6">
                                <input id="yeargrad" class="form-control date-own" type="number" name="yeargrad">
                            </div>
                             


                          <script type="text/javascript">
                              $('.date-own').datepicker({
                                 minViewMode: 2,
                                 format: 'yyyy'
                               });
                          </script>

                        </div>
                         <div class="form-group">
                            <label for="course" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Course:</label>

                            <div class="col-md-6">
                                <input id="course" class="form-control date-own" type="text" name="course">
                            </div>
                            
                        </div>
                       
                     
                       

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  
  <footer id="gtco-footer" role="contentinfo">
    <div class="gtco-container">
      <div class="row row-p b-md">

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
  </div> -->
  
  <!-- jQuery -->
  <!-- <script src="{{asset('landing/js/jquery.min.js')}}"></script>
 
<script src="{{asset('landing/js/jquery.easing.1.3.js')}}"></script>
 
  <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
  
  <script src="{{asset('landing/js/jquery.waypoints.min.js')}}"></script>

  <script src="{{asset('landing/js/owl.carousel.min.js')}}"></script>

  <script src="{{asset('landing/js/jquery.countTo.js')}}"></script>

  <script src="{{asset('landing/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('landing/js/magnific-popup-options.js')}}"></script>
  
  <script src="{{asset('landing/js/main.js')}}"></script>

  </body>
</html> -->
404 not found