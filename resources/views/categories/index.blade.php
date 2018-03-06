
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
        <li class="active"><a href="#">Home<span class="sr-only"></span></a></li>
        <li><a href="/create">Create Post</a></li>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/aboutus">About us</a></li>
            <li><a href="{{ route('categories.index')}}">Admin Position</a></li>
            <li><a href="/contactus">Contact us</a></li>
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
    <div class="col-md-8">
      <h1>Admin Position</h1>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            
              <th>{{ $category->id }}</th>
              <td>{{ $category->name }}</td>
           
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
    <div class="col-md-3">
      <div class="well">
        <form method="POST" action="{{ route('categories.store') }}" role="form">
      <h3>Add Admin Position</h3>
       <label for="name">Name:</label>
       <input type="text" class="input {{$errors->has('name') ? 'is-danger' : ''}} form-control" name="name" id="name" value="{{old('name')}}" required><br>
      <input type="submit" value="Save" class="btn btn-primary btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>﻿
      </div>
    </div>

</div>
</div>
       
      <hr><p class="text-center"> Copyright sample - All right reserved</p>




    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>





