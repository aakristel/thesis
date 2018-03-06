
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
</head>
<body>
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Our Lady of Fatima University</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/home">Home<span class="sr-only"></span></a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-bell" style="color: orange"></span>Notification</a></li>
         <li><a href="#" ><span class="glyphicon glyphicon-envelope" style="color: blue"></span>Message</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>Submit</button>
      </form>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/aboutus">About us</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Logout</a></li>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact us</div>

                <div class="panel-body">
                   <form>
                      <div class="form-group">
                          <label name="email"> Email: </label>
                          <input id="email" name="email" class="form-control" value="name@gmail.com">
                      </div>
                      <div class="form-group">
                          <label name="subject"> Subject: </label>
                          <input id="subject" name="subject" class="form-control">
                      </div>
                      <div class="form-group">
                          <label name="message"> Message: </label>
                          <textarea id="message" name="message" class="form-control" placeholder="Type your message here"></textarea>
                      </div>
                      <input type="submit" value="Send Message" class="btn btn-success">
                  </form>
         
                </div>
            </div>
        </div>
    </div>
</div>
      
      <hr><p class="text-center"> Cpoyright sample - All right reserved</p>
   </div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>





