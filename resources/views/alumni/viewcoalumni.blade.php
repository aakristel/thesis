@extends('alumnilayouts.main')


@section('content')
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;background-color: green" id="mySidebar">

  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    @if ($user->image == '')
        <h3 class="w3-wide"><b><img src="{{ asset('images/profile.png')}}" height="200" width="200" /></b></h3>
      @else
    <h3 class="w3-wide"><b><img src="{{ asset('images/'. $user->image)}}" height="200" width="200" /></b></h3>
    @endif

         <h4>{{ $user->name }} {{ $user->middlename }} {{ $user->lastname }}</h4>
          <p style="color: black">Bio: {{ $user->bio }}</p>
  </div>



  <div class="w3-padding-60 w3-large w3-text-grey" style="font-weight:bold; color: black">
    <a href="/home" class="w3-bar-item w3-button"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
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
      <p><i class="fa fa-bookmark" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Course: {{ $user->course }} <strong>Year Graduated: </strong> {{ $user->yeargrad }}</p>
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




@endsection