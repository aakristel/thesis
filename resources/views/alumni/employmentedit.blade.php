@extends('alumnilayouts.main')

@section('content')
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;background-color: green" id="mySidebar">

  <div class="w3-container w3-display-container w3-padding-16" style="background-color: #adccad">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b><img src="{{ asset('images/'. $user->image)}}" height="100" width="100" /></b></h3>
     <form enctype="multipart/form-data" method="POST" action="/updatefeaturedimage/{{$user->id}}">
            
            <label>Update Profile Image</label>
            <input type="file" name="featuredimage" required="">
             <input type="submit" value="update" class="btn btn-success">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

          </form>

         <h4> <a href="/viewprofile/{{$user->id}}">{{ Auth::user()->name }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</a></h4>
          <p style="color: black">Bio: {{ Auth::user()->bio }}</p>
  </div>



  <div class="w3-padding-60 w3-large w3-text-grey" style="font-weight:bold; color: black">
    <a href="/home" class="w3-bar-item w3-button"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="#one" class="w3-bar-item w3-button" ><i class="fa fa-info" aria-hidden="true"></i>  Personal Information</a>
    <a href="#two" class="w3-bar-item w3-button"><i class="fa fa-picture-o" aria-hidden="true"></i> My Gallery</a>
    <a href="#three" class="w3-bar-item w3-button"><i class="fa fa-bar-chart" aria-hidden="true"></i> Employment Status</a>
    <a href="#four" class="w3-bar-item w3-button"><i class="fa fa-clipboard" aria-hidden="true"></i> My Posts</a></li>
    <a href="/updateprofile/{{$user->id}}" class="w3-bar-item w3-button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Profile</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide"><img src="{{ asset('images/'. $user->image)}}" height="100" width="100" /></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge" id="one">
    <p class="w3-left">Personal Information</p><br><hr>
    <p class="w3-left" ">
      <p><i class="fa fa-bookmark" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Course: {{ Auth::user()->course }} <strong>Year Graduated: </strong> {{ Auth::user()->yeargrad }}</p>
      <p><i class="fa fa-circle-o-notch" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Civil Status: {{ Auth::user()->civil }}</p>
      <p><i class="fa fa-venus-mars" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Gender: {{ Auth::user()->gender }}</p>
      <p><i class="fa fa-map-marker" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Address: {{ Auth::user()->address }}</p>
      <p><i class="fa fa-envelope" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Email: {{ Auth::user()->email }}</p>
      <p><i class="fa fa-volume-control-phone" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Contact: {{ Auth::user()->contact }}</p>
      <p><i class="fa fa-handshake-o" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Religion: {{ Auth::user()->religion }}</p>
    </p>
  </header>
<hr>
  


 <div class="container">
									<h3>Employment Experiences</h3>
									<p>I am currently {{ Auth::user()->employment }}</p>
									
			<form method="POST" action="{{route('employments.update', $employment->id)}}" >
				{{ method_field('PUT') }}
		      <div class="form-group col-md-10 col-md-offset-2"> 
		        <label for="body">Company Name:</label>
		        <textarea type="text" class="form-control input-lg" id="name" name="name" rows="2" style="resize:none; overflow-y: hidden; overflow-x: hidden;">{{ $employment->body }}</textarea>
		      </div>
		      <div class="form-group col-md-10 col-md-offset-2"> 
		        <label for="body">Work Description:</label>
		        <textarea type="text" class="form-control input-lg" id="work" name="body" rows="3" style="resize:none; overflow-y: hidden; overflow-x: hidden;">{{ $employment->body }}</textarea>
		      </div>
		      <div class="form-group col-md-10 col-md-offset-2"> 
		        <label for="body">Year Lenght:</label>
		        <textarea type="text" class="form-control input-lg" id="year" name="year" rows="3" style="resize:none; overflow-y: hidden; overflow-x: hidden;">{{ $employment->year }}</textarea>
		      </div>
		     	
		      
		   		<div class="col-md-10 col-md-offset-2">
		   			
		   			<button type="submit" class="btn btn-primary btn-block">Save</button><br>
		   			<a href="/viewprofile/{{$user->id}}" class="btn btn-success btn-block">Cancel</a>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
		   		</div>

              
              
            </form>﻿
							
								</div>



@endsection