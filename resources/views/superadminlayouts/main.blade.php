
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
      <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Alumni | Our Lady of Fatima University</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
    
    </style>
</head>
<body>

<nav class="navbar navbar-default" style="background-color: #354265; color: white">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('superadmin.dashboard')}}" style="color: white">Our Lady of Fatima University</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('superadmin') ? 'active' : '' }}"><a href="/superadmin" style="color: white">Home <span class="sr-only"></span></a></li>
        <li class="{{ Request::is('addadmin') ? 'active' : '' }}"><a href="/addadmin" style="color: white">Alumni Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <form class="navbar-form navbar-left" action="/searchsuperadmin" method="POST" role="search">
     {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="q">
        
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </div>
      </form>

        <!-- <li><a href="#"><span class="glyphicon glyphicon-bell" style="color: orange"></span>Notification</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white">Welcome  {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
           
            <li role="separator" class="divider"></li>
            <li> <a href="{{ route('superadmin.logout') }}">
                    Logout
                    </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


@yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

