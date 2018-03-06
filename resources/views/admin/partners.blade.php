@extends('adminlayouts.main')

@section('title','| Alumni Partners')

@section('content')

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/partners">Alumni Partners</a>
        </li>
        <li class="breadcrumb-item active">Alumni Partners List</li>
      </ol>
      <!-- Icon Cards-->
     <!--  start of AlumniPartners -->
          <div class="row">
    <div class="col-md-10">
          <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
      <a href="{{route('alumnipartners.create')}}" class="btn btn-lg btn-block btn-primary">Create new Alumni Partners</a>
    </div>
    <div class="col-md-12">
    <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
        
        </tbody>
      </table>
      <div class="text-center">
     
      </div>
    </div>
  </div>
          
     
   @endsection