
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
       

      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li>

     <form class="navbar-form" action="/searchalumni" method="POST" role="search">
            {{ csrf_field() }}
    <div class="input-group add-on">
      <input class="form-control" placeholder="Search" name="q" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" style="color: #17B794" ></i></button>
      </div>
    </div>
  </form></li>



          <li><a href="{{route('user.logout')}}" style="color: #fff"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
          
        
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

<div class="container">
    @if(isset($details))
        <p> You are looking for <b> {{ $query }} </b> are :</p>
    <h2>Alumni Users</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Campus</th>
                <th>Course</th>
                <th>Year Graduated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
               <td> <a href="/viewcoalumni/{{$user->id}}">{{$user->name}} {{$user->middlename}} {{$user->lastname}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->campus}}</td>
                <td>{{$user->course}}</td>
                <td>{{$user->yeargrad}}</td>
             
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
   <h1>No Results Found</h1>
    @endif
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>





