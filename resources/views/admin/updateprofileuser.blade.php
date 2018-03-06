<!DOCTYPE html>
<html>
<title>Alumni | Update Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('profile2/w3.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
}

/* The grid: Four equal columns that floats next to each other */
.column {
    float: left;
    width: 25%;
    padding: 10px;
}

/* Style the images inside the grid */
.column img {
    opacity: 0.8; 
    cursor: pointer; 
}

.column img:hover {
    opacity: 1;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* The expanding image container */
.container {
    position: relative;
    display: none;
}

/* Expanding image text */
#imgtext {
    position: absolute;
    bottom: 15px;
    left: 15px;
    color: white;
    font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
    position: absolute;
    top: 10px;
    right: 15px;
    color: white;
    font-size: 35px;
    cursor: pointer;
}
</style>
<body class="w3-content" style="max-width:1500px">


<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;background-color: green" id="mySidebar">

  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    @if ($user->image == '')
        <h3 class="w3-wide"><b><img src="{{ asset('images/profile.png')}}" height="200" width="200" /></b></h3>
      @else
    <h3 class="w3-wide"><b><img src="{{ asset('images/'. $user->image)}}" height="200" width="200" /></b></h3>
    @endif
<form method="POST" action="{{route('updateprofileuser.update', $user->id)}}">
{{ method_field('PUT') }}
          <h4>{{ $user->name }} {{ $user->middlename }} {{ $user->lastname }}</h4>
          <p style="color: black">Bio: {{ $user->bio }}</p>
  </div>

<hr>

  <div class="w3-padding-60 w3-large w3-text-grey" style="font-weight:bold; color: black">
    <a href="#one" class="w3-bar-item w3-button" ><i class="fa fa-info" aria-hidden="true"></i>  Personal Information</a>
    <a href="#two" class="w3-bar-item w3-button"><i class="fa fa-picture-o" aria-hidden="true"></i> My Gallery</a>
    <a href="#three" class="w3-bar-item w3-button"><i class="fa fa-bar-chart" aria-hidden="true"></i> Employment Status</a>
    <a href="#four" class="w3-bar-item w3-button"><i class="fa fa-clipboard" aria-hidden="true"></i> My Posts</a></li>
   
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

       <div class="col-md-6">
      <p><i class="fa fa-bookmark" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Course: 
        <select name="course" class="form-control">
          <option value="{{ $user->course }}">{{ $user->course }}</option>
               @foreach($courses as $course)
                                <option value="{{$course->name}}">{{$course->name}}</option>
                                  @endforeach
          </select>
        </p></div>
        <div class="col-md-6">
        <p><i class="fa fa-graduation-cap" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> 
        Year Graduated: <textarea name="yeargrad" rows="1" style="resize:none; overflow-y: hidden; overflow-x: hidden;" class="form-control">{{ $user->yeargrad }}</textarea></p><hr>
        </div>
<div class="col-md-6"><button type="submit" class="btn btn-primary btn-block">Update</button>  </div>
<div class="col-md-6"><a href="/viewalumni/{{$user->id}}" class="btn btn-success btn-block">Cancel</a> <input type="hidden" name="_token" value="{{ Session::token() }}"></div><br><hr>
  </form>

      <p><i class="fa fa-circle-o-notch" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Civil Status: {{ $user->civil }}</p>
      <p><i class="fa fa-venus-mars" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Gender: {{ $user->gender }}</p>
      <p><i class="fa fa-map-marker" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Address: {{ $user->address }}</p>
      <p><i class="fa fa-envelope" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Email: {{ $user->email }}</p>
      <p><i class="fa fa-volume-control-phone" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Contact: {{ $user->contact }}</p>
      <p><i class="fa fa-handshake-o" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Religion: {{ $user->religion }}</p>
    </p>
  </header>
<hr>
  <!-- Image header -->
  <div class="w3-display-container w3-container" id="two">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
    </div>
  </div>
  <h1>My Gallery</h1>
  <div class="row">
    @foreach($user->hobbies as $hobby)
  <div class="column">
    <img src="{{ asset('images/'. $hobby->image)}}" alt="{{$hobby->body}}" style="width:90%" onclick="myFunction(this);">

  </div>
@endforeach

</div>

<div class="container">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:100%">
  <div id="imgtext"></div>
</div>

<script>
function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
</script>





  <!-- Subscribe section -->
  <div class="w3-container w3-black w3-padding-32" id="three">
    <h1>Employment Status</h1>
    <p>I am currently {{ $user->employment }} </p>
    Industry {{ $user->username }}
  </div>
  
  <!-- Footer -->
  <footer class="w3-padding-60 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s5">
         @foreach ($user->employments as $employmentsa)
         <h4>Company Name:<strong> {{$employmentsa->name}}</strong></h4>
            <p><strong>Work Description: {{$employmentsa->body}} </strong></p>
            <p><strong>Year Lenght: {{$employmentsa->year}} </strong></p>
                        
            <p>
            	
            </p>

          @endforeach

      </div><br>

  </footer><br>

   <div class="w3-container w3-black w3-padding-32" id="four">
    <h1>My Posts</h1>
     <p>This is my Posts</p>
   </div>
              <table class="table">
                      <thead>
                      
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
                        
                        </tr>

                        @endforeach
                      </tbody>
                    </table>

  <!-- End page content -->



<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>