@extends('adminlayouts.main')

@section('title','| My Account')


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    	<h1>My Account</h1><hr>
 @include('flash::message')
   	
<form method="POST" action="{{route('updatemyaccount', $admin->id)}}">
{{ method_field('PUT') }}

  <div class="row">
    <div class="col-md-4">
    	<label>Firstname:</label>
  <textarea name="name" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter Firstname" class="form-control" required="">{{ $admin->name }}</textarea><br>
    </div>

    <div class="col-md-4">
    	<label>Middlename:</label>
  <textarea name="middlename" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter Middlename" class="form-control">{{ $admin->middlename }}</textarea><br>
    </div>

    <div class="col-md-4">
    	<label>Lastname:</label>
  <textarea name="lastname" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter Lastname" class="form-control" required="">{{ $admin->lastname }}</textarea><br>
    </div>

    <div class="col-md-6">
    	<label>Admin Position:</label>
  <textarea name="adminposition" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter Admin Position" class="form-control" required="">{{ $admin->adminposition }}</textarea><br>
    </div>

	<div class="col-md-6">
	    	<label>Campus:</label>
	   <select name="campus" class="form-control">
                                @foreach($camps as $campss)
                                <option value="{{$campss->title}}">{{$campss->title}}</option>
                                  @endforeach
                                </select>
                              </div>

	 <div class="col-md-6">
    	<label>email:</label>
	  <textarea name="email" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter Email" class="form-control" required="">{{ $admin->email }}</textarea><br>
	    </div>

	    <div class="col-md-6">
    	<label>Course Department:</label>
	  <textarea name="department" rows="1"  style="resize:none; overflow-y: hidden; overflow-x: hidden; color: black" placeholder="Enter Department" class="form-control">{{ $admin->department }}</textarea><br>
	    </div>

	  <div class="col-md-6"><button type="submit" class="btn btn-primary btn-block">Update</button><br>  </div>
		<div class="col-md-6"><a href="{{route('admin.dashboard')}}" class="btn btn-danger btn-block">Cancel</a>
		 <input type="hidden" name="_token" value="{{ Session::token() }}">
	 </div>
<div class="col-md-6"><a href="/adminchangePassword" class="btn btn-success btn-block">Change Password</a></div>
  </div>
</form>

</div>
</div>

@endsection  