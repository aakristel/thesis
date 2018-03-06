
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Bootstrap -->
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="{{ asset('admins/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <link href="{{ asset('admins/css/sb-admin.css')}}" rel="stylesheet">
    <title>Alumni | Our Lady of Fatima University</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
    
    </style>
</head>
<body>

    <header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(http://localhost:8000/images/olfupamp.jpg">
    <div class="overlay"></div>

<nav class="navbar navbar-default" style="background-color: rgba(29, 43, 83, 0.89);">
  <div class="container-fluid">
       <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src ="{{asset('images/logotrans.png')}}" width="60" height="60"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="/home" style="color: #fff"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
       

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell" style="color:#17B794"></i>
            <span class="d-lg-none" style="color: white">Notification
              <span class="badge badge-number badge-warning"></span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
          
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Posts</h6>




            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>


          <li><a href="#" style="color: #fff"><span class="glyphicon glyphicon-envelope" style="color: #17B794"></span>&nbsp;Message</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li>

     <form class="navbar-form navbar-left" action="/searchalumni" method="POST" role="search">
     {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="q">
        
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </div>
      </form></li>

          
          <li><a href="/viewprofile/{{$user->id}}" style="color: #fff"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('images/'. $user->image)}}" width="30" height="30"> Welcome {{ Auth::user()->name }}</a></li>

          <li><a href="{{route('user.logout')}}" style="color: #fff"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>




<div class="container">
  <div class="row">
    <div class="col-md-8">
      @if ($alumpost->image == '')
      @else
        <img src="{{ asset('images/'. $alumpost->image)}}" width="300" height="300">
        @endif
      
     <h1>{{ $alumpost->title }}<h1>
    <p class="lead">{{ $alumpost->subject }}</p>
  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($alumpost->created_at)) }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($alumpost->updated_at)) }}</dd>
      </dl>
           <a href="/viewprofile/{{$user->id}}" class="btn btn-success btn-default btn-block">>> Profile</a>
         <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#deletemodal">Delete</button>

      <hr>

      </div>
      
    </div>
  </div>
</div>

 <!-- Delete Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="declinemodal">Delete?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you sure you want to delete this post?</div>
          <div class="modal-footer">
           
             <form method="POST" action="/deletealumnipost/{{$alumpost->id}}">
            <input type="submit" value="Delete" class="btn btn-danger">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
           {{ method_field('DELETE') }}
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>





