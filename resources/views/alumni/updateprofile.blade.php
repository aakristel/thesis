@extends('alumnilayouts.main')

@section('content')
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">

  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
     @if ($user->image == '')
        <h3 class="w3-wide"><b><img src="{{ asset('images/profile.png')}}" height="200" width="200" /></b></h3>
      @else
    <h3 class="w3-wide"><b><img src="{{ asset('images/'. $user->image)}}" height="200" width="200" /></b></h3>
    @endif
     <form enctype="multipart/form-data" method="POST" action="/updatefeaturedimage/{{$user->id}}">
            
            <label>Update Profile Image</label>
            <input type="file" name="featuredimage" required="">
             <input type="submit" value="update" class="btn btn-success">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

          </form>

<form method="POST" action="{{route('updateprofile.update', $user->id)}}">
{{ method_field('PUT') }}

         <h4><textarea name="name" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter Firstname" class="form-control">{{ Auth::user()->name }}</textarea> 

         	<textarea name="middlename" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter middlename" class="form-control">{{ Auth::user()->middlename }}</textarea> 
         	
         	<textarea name="lastname" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter Lastname" class="form-control">{{ Auth::user()->lastname }}</textarea></h4>
          <p style="color: black">Bio: <textarea name="bio" rows="3"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Tell something about yourself" class="form-control">{{ Auth::user()->bio }}</textarea></p>
  </div>



  <div class="w3-padding-60 w3-large w3-text-grey" style="font-weight:bold">
    <a href="/home" class="w3-bar-item w3-button"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="#one" class="w3-bar-item w3-button" ><i class="fa fa-info" aria-hidden="true"></i>  Personal Information</a>
    <a href="#four" class="w3-bar-item w3-button"><i class="fa fa-clipboard" aria-hidden="true"></i> My Posts</a></li>
   
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
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
    
      
      <div class="col-md-4">
      <p><i class="fa fa-bookmark" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Course: 
        <select name="course" class="form-control">
          <option value="{{ Auth::user()->course }}">{{ Auth::user()->course }}</option>
               @foreach($courses as $course)
                                <option value="{{$course->name}}">{{$course->name}}</option>
                                  @endforeach
          </select>
      	</p></div>

        <div class="col-md-4">
        <p><i class="fa fa-graduation-cap" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> 
        Year Graduated: <textarea name="yeargrad" rows="1" style="resize:none; overflow-y: hidden; overflow-x: hidden;" class="form-control">{{ Auth::user()->yeargrad }}</textarea></p>
        </div>

       <div class="col-md-4">
      <p><i class="fa fa-circle-o-notch" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Civil Status: 

       <select name="civil" class="form-control">
                                <option value="{{ Auth::user()->civil }}">{{ Auth::user()->civil }}</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Seperated">Separated</option>
                                <option value="Widowed">Widowed</option>
                                 <option value="Single">Single</option>
                              </select>

      </p></div>

     <div  class="col-md-4">
      <p><i class="fa fa-venus-mars" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Gender: 

          <select name="gender" class="form-control">
              <option value="{{ Auth::user()->gender }}">{{ Auth::user()->gender }}</option>
                          <option value="Male">Male</option>
                              <option value="Female">Female</option>
                    </select>

      </p></div>

      <div class="col-md-8">
      <p><i class="fa fa-map-marker" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Address: <textarea name="address" rows="1" style="resize:none; overflow-y: hidden; overflow-x: hidden;" class="form-control">{{ Auth::user()->address }}</textarea></p><hr></div>

      <div class="col-md-4">
      <p><i class="fa fa-envelope" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Email: <textarea name="email" rows="1" style="resize:none; overflow-y: hidden; overflow-x: hidden;" class="form-control">{{ Auth::user()->email }}</textarea></p></div>

      <div class="col-md-4">
      <p><i class="fa fa-volume-control-phone" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Contact: <textarea name="contact" type="number" rows="1" style="resize:none; overflow-y: hidden; overflow-x: hidden;" class="form-control">{{ Auth::user()->contact }}</textarea></p></div>

      <div class="col-md-4">
      <p><i class="fa fa-handshake-o" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Religion: <textarea name="religion" rows="1" style="resize:none; overflow-y: hidden; overflow-x: hidden;" class="form-control">{{ Auth::user()->religion }}</textarea></p>
    </p></div>
    <div class="col-md-4">
    <p> Employment Status: 
      <select name="employment" class="form-control">
        <option value="{{ Auth::user()->employment }}">{{ Auth::user()->employment }}</option>
        <option value="Unemployed">Unemployed</option>
        <option value="Underemployed">Underemployed</option>
        <option value="Employed">Employed</option>
      </select></p></div>

      <div class="col-md-4">
    <p>Industry: <textarea name="username" rows="1" style="resize:none; overflow-y: hidden; overflow-x: hidden;" class="form-control">{{ Auth::user()->username }}</textarea></p>
    </p><hr></div>

    

    <div class="col-md-6"><button type="submit" class="btn btn-primary btn-block">Update</button>  </div>
<div class="col-md-6"><a href="/viewprofile/{{$user->id}}" class="btn btn-success btn-block">Cancel</a> <input type="hidden" name="_token" value="{{ Session::token() }}"></div><br><hr>
  </form>

  </header>
<hr>
 <!-- Image header -->
  <div class="w3-display-container w3-container" id="two">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
    </div>
  </div>

 

   



   <div class="w3-container w3-black w3-padding-32" id="four">
    <h1>My Posts</h1>
     <p>This is my Posts</p>
   </div><div class="tabble responsive">
              <table class="table table-striped">
                      <thead class="thead-dark">
                      
                        <th>Title</th>
                        <th>Body</th>
                        <th>Status</th>
                        <th>Created At:</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @foreach ($user->alumposts as $alumpost)

                        <tr>
                          
                          <td>{{ $alumpost->title }}</td>

                          <td>{{ substr($alumpost->subject, 0, 50)  }}{{ strlen($alumpost->subject) > 50 ? "......" : "" }}</td>
                        @if ($alumpost->approved == 1)
                        <td><label style="color: blue">Approved</label></td>
                    @else
                     <td><label style="color: red">Pending</label></td>
                
                    @endif
                          
                          <td>{{ date('M j, Y', strtotime($alumpost->created_at)) }}</td>

                      <td><a href="/showalumnipost/{{$alumpost->id}}" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span> View</a></td>
                          </th>
                        </tr>

                        @endforeach
                      </tbody>
                    </table>
    </div>

@endsection










































