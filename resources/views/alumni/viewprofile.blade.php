@extends('alumnilayouts.main')


@section('content')
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;background-color: green" id="mySidebar">

  <div class="w3-container w3-display-container w3-padding-16" >
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
  <header class="w3-container w3-large" id="one">
    <h1>Personal Information</h1><br><hr>
    <p class="w3-left" ">
      <p><i class="fa fa-bookmark" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Course: {{ Auth::user()->course }}</p>
      <p><i class="fa fa-graduation-cap" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Year Graduated:{{ Auth::user()->yeargrad }}</p>
      <p><i class="fa fa-circle-o-notch" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Civil Status: {{ Auth::user()->civil }}</p>
      <p><i class="fa fa-venus-mars" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Gender: {{ Auth::user()->gender }}</p>
      <p><i class="fa fa-map-marker" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Address: {{ Auth::user()->address }}</p>
      <p><i class="fa fa-envelope" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Email: {{ Auth::user()->email }}</p>
      <p><i class="fa fa-volume-control-phone" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Contact: {{ Auth::user()->contact }}</p>
      <p><i class="fa fa-handshake-o" aria-hidden="true" style="color: rgba(29, 43, 83, 0.89)"></i> Religion: {{ Auth::user()->religion }}</p>
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
  <a href="{{route('hobbies.edit', $hobby->id)}}" class="btn btn-success">
         <span class="glyphicon glyphicon-pencil"></span>              
       </a>

        <a href="{{route('hobbies.delete', $hobby->id)}}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span>
        </a>

  </div>
@endforeach

</div>
<a class="btn btn-success" data-toggle="modal" data-target="#addhobby">Add something you love to do</a><br><hr>
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
    <p>I am currently {{ Auth::user()->employment }} </p>
    Industry {{ Auth::user()->username }}
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

        <a href="{{route('employments.edit', $employmentsa->id)}}" class="btn btn-success">
      <span class="glyphicon glyphicon-pencil"></span>
      </a>
       <a href="{{route('employments.delete', $employmentsa->id)}}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span>
      </a></p>

          @endforeach

        <a class="btn btn-success" data-toggle="modal" data-target="#addemployment">Add Employment Status</a><br>

      </div><br>

  </footer><br>

   <div class="w3-container w3-black w3-padding-32" id="four">
    <h1>My Posts</h1>
     <p>This is my Posts</p>
   </div>
              <table class="table table-striped">
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

                      <td><a href="/showalumnipost/{{$alumpost->id}}" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span> View</a></td>
                          </th>
                        </tr>

                        @endforeach
                      </tbody>
                    </table>

  <!-- End page content -->





<!-- Add Hobby Modal-->
    <div class="modal fade" id="addhobby" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="declinemodal">Adventures</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Add things that you love! We are happy to know your experience!</div>
          <div class="modal-footer">

            
             <form method="POST" action="{{ route('hobbies.store', $user->id) }}" enctype="multipart/form-data">
        
                   <textarea name="body" id="body" rows="3" class="form-control" placeholder="Enter some adventures" style="resize:none; overflow-y: hidden; overflow-x: hidden;" required=""></textarea><br>

                   <label for="featuredimage">Upload Image</label>
                   <input type="file" name="featuredimage" >


          <input type="submit" value="Add" class="btn btn-primary">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      </form>
      
          </div>
        </div>
      </div>
    </div>

<!-- Add Employment Status Modal-->
    <div class="modal fade" id="addemployment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="declinemodal">Employment</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Add your Experience! We are happy to know your experience!</div>
          <div class="modal-footer">

            
             <form method="POST" action="{{ route('employments.store', $user->id) }}">
        
                   <textarea name="name" id="name" rows="1" class="form-control" placeholder="Enter the Company Name"  style="resize:none; overflow-y: hidden; overflow-x: hidden;" required=""></textarea><br>

                  
                  <textarea name="body" id="body" rows="5" class="form-control" placeholder="Enter Your Job Position"  style="resize:none; overflow-y: hidden; overflow-x: hidden;" required=""></textarea><br>

                
                  <textarea name="year" id="year" rows="1" class="form-control" placeholder="Enter your Year Lenght"  style="resize:none; overflow-y: hidden; overflow-x: hidden;" required=""></textarea><br>

          <input type="submit" value="Update" class="btn btn-primary">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      </form>
      
          </div>
        </div>
      </div>
    </div>



@endsection