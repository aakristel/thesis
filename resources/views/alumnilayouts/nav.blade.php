<!DOCTYPE html>
<html>
<title>Alumni @yield('title')</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('newsfeed/css/w3.css')}}">
<link rel="stylesheet" href="{{asset('newsfeed/css/w3-theme-blue-grey.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="{{asset('newsfeed/css/font-awesome.min.css')}}" type="text/css">
 <link href="{{ asset('admins/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('newsfeed/css/bootstrap.min.css')}}">
    <script src="{{asset('newsfeed/js/jquery.min.js')}}"></script>
    <script src="{{asset('newsfeed/js/bootstrap.min.js')}}"></script>

    
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<style>
.dropbtn {
    background-color: #354265;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: gray;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 300px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0);
    z-index: 1;
    overflow-x: auto;
    overflow-y: auto;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    overflow-x: auto;
    overflow-y: auto;
}

.dropdown a:hover {background-color: white}

.show {display:block;}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-left-align w3-large" style="background-color: #354265; color: white">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-medium w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>

  <a href="/home" class="w3-bar-item w3-button w3-padding-medium" ><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('images/logotrans.png')}}" width="30" height="30"> Our Lady of Fatima University</a>


  
  <div class="w3-dropdown-hover w3-hide-small">
    <!-- <button class="w3-button w3-padding-medium" ><i class="fa fa-bell"></i>
       @if(auth()->user()->unreadnotifications->count())
    <span class="w3-badge w3-right w3-small w3-green">{{ auth()->user()->unreadnotifications->count() }}</span>
    @endif
  </button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="{{route('markRead')}}" style="color: green">Mark all as Read</a>
      @foreach (auth()->user()->unreadnotifications as $notification) -->
      
     <!--  {{url('notifications/'.$notification->id)}} -->
     <!--  <a href=" {{$notification->data['action']}}" id="markasread" onclick="markNotificationsAsRead()" class="w3-bar-item w3-button" style="background-color: lightgray">{{$notification->data['data']}}</a>
      

      @endforeach
       @foreach (auth()->user()->readnotifications as $notification)
      <a href="{{$notification->data['action']}}" class="w3-bar-item w3-button">{{$notification->data['data']}}</a>
      @endforeach
    </div>
  </div> --></div>
  <a href="{{route('user.logout')}}" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-medium w3-hover-white" title="Logout">
   <i class="glyphicon glyphicon-log-out"></i>Logout 
  </a>
  <!-- <form class="w3-bar-item w3-hide-small w3-right w3-padding-small" action="/search" method="POST" role="search">
            {{ csrf_field() }}
      <input class="form-control" placeholder="Search" name="q" type="text">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" style="color: #17B794" ></i></button>
  </form> -->
  <form class="navbar-form navbar-left" action="/searchalumni" method="POST" role="search">
     {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="q">
        
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </div>
      </form>

<div class="dropdown">

<button onclick="myNotification()" id="markasread" class="dropbtn"><i class="fa fa-bell"></i>Notification
@if(auth()->user()->unreadnotifications->count())
    <span class="w3-badge w3-right w3-small w3-green">{{ auth()->user()->unreadnotifications->count() }}</span>
    @else
    <span class="w3-badge w3-right w3-small w3-green">0</span>
    @endif

</button>
  <div id="myDropdown" class="dropdown-content">
     @foreach (auth()->user()->unreadnotifications as $notification)
    <a href="{{$notification->data['action']}}" style="background-color: lightgray">{{$notification->data['data']}}</a>
      @endforeach
      @foreach (auth()->user()->readnotifications as $notification)
      <a href="{{$notification->data['action']}}" class="w3-bar-item w3-button">{{$notification->data['data']}}</a>
      @endforeach
  
  </div>
</div>


 </div>

</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="" class="w3-bar-item w3-button w3-padding-large">Noftification</a>
  <a href="{{route('user.logout')}}" class="w3-bar-item w3-button w3-padding-large">Logout</a>
</div>






@yield('content')


 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<!-- <script>
        $('a[data-notification-id]').click(function () {

        var notif_id   = $(this).data('notifId');
        var targetHref = $(this).data('href');

        $.post('/NotifMarkAsRead', {'notif_id': notif_id}, function (data) {
            data.success ? (window.location.href = targetHref) : false;
        }, 'json');

        return false;
    });
      </script> -->
 <script type="text/javascript">
        function markNotificationsAsRead(){
          // alert('clicked');
          $.get('/markAsRead');
        }
      </script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myNotification() {
  $.get('/markAsRead');
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


</body>
</html> 