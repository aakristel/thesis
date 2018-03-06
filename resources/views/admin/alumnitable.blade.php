@extends('adminlayouts.main')

@section('title','| Alumni Accounts')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/alumnitable">Alumni</a>
        </li>
        <li class="breadcrumb-item active">Alumni List</li>
      </ol>
         @include('flash::message')
      <!-- Icon Cards-->
     <!--  start of AlumniTable -->
       <div class="row">
    <div class="col-md-10">
          <h1>All Alumni</h1>
          <form class="form-inline my-2 my-lg-0 mr-lg-2" action="/searchalumniuser" method="POST" role="search">
             {{ csrf_field() }}
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for..." name="q">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
          
    </div>
    <div class="col-md-2">
      <a href="/alumniaccount" class="btn btn-primary">Create new Alumni User</a>
    </div>
    <div class="col-md-12">
    <hr>
    </div>
  </div>
          <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
        
          <th>Name</th>
          <th>Course</th>
          <th>Email</th>
          <th>Campus</th>
       
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($users as $user)

          <tr>
            <td>{{ $user->name }} {{$user->lastname}}</td>
            <td>{{ $user->course }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->campus}}</td>
           
            <td>{{ date('M j, Y', strtotime($user->created_at)) }}</td>
            <td><a href="/viewalumni/{{$user->id}}" class="btn btn-default btn-sm btn-danger"><i class="fa fa-eye" aria-hidden="true"></i> View </a></td>
            </th>
          </tr>

          @endforeach
         
        </tbody>
      </table>
      <div class="text-center">
        {!! $users->links(); !!}
      </div>
    </div>
  </div>
          
     
   @endsection
