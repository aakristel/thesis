@extends('adminlayouts.main')

@section('title','| Add campus')

@section('content')

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">OLFU Campus</a>
        </li>
        <li class="breadcrumb-item active">OLFU Campuses List</li>
      </ol>
      <!-- Icon Cards-->
     <!--  start of AlumniPartners -->
     
 <div class="row">
    <div class="col-md-10">
          <h1>All Olfu Campus</h1>
    </div>
    <div class="col-md-2">
      <a href="{{route('campus.create')}}" class="btn btn-lg btn-block btn-primary">Add new Campus</a>
    </div>
    <div class="col-md-12">
    <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          
          <th>Title</th>
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
       @foreach ($camps as $campus)

          <tr>
            
            <td>{{ $campus->title }}</td>
            <td>{{ date('M j, Y', strtotime($campus->created_at)) }}</td>
           
            <td><a href="{{route('campus.destroy', $campus->id)}}" class=" btn btn-default btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View</a></td>
            
        

          @endforeach
        </tbody>
      </table>
      <div class="text-center">
       
     
      </div>
    </div>
  </div>
          
     
   @endsection