 


 <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('admin.dashboard')}}">Welcome {{ Auth::user()->name }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{ Request::is('postslist') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link " href="/postslist">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Admin Posts</span>
          </a>
          <li class="nav-item {{ Request::is('postslistalumni') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/postslistalumni">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Alumni Posts</span>
          </a>
        </li>
        <li class="nav-item {{ Request::is('alumnitable') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/alumnitable">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Alumni</span>
          </a>
        </li>

        <li class="nav-item {{ Request::is('alumnipartners') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{route('alumnipartners.index')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Alumni Partners</span>
          </a>
        </li>
        <li class="nav-item {{ Request::is('myaccount') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/myaccount/{{$admin->id}}">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My Account</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope" style="color: blue"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a> -->
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <!-- <h6 class="dropdown-header">New Messages:</h6> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell" style="color: orange"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-number badge-warning"></span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
            {{$alumposts->count()}}
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown" style="overflow: auto; overflow-y: scroll; overflow-x: scroll" >
            <h6 class="dropdown-header">Alumni Posts Confirmation</h6>
              @foreach ($alumposts as $alumpost)
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/showalumniposts/{{$alumpost->id}}" >
              <span class="text-success">
              
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>{{ substr($alumpost->title, 0, 10)  }}{{ strlen($alumpost->title) > 10 ? "......" : "" }}</strong>
              </span>
              
              <div class="dropdown-message small">{{ substr($alumpost->subject, 0, 10)  }}{{ strlen($alumpost->subject) > 10 ? "......" : "" }}</div>
           
            </a>
              @endforeach




            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="/postslistalumni">View all alerts</a>
          </div>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;





        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-plus" style="color: red"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-number badge-warning"></span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Alumni Registration Confirmation</h6>
            




            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="/postslistalumni">View all alerts</a>
          </div>
        </li> -->




        
        <li class="nav-item">
          
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
