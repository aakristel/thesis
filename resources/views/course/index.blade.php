@extends('adminlayouts.main')

@section('title','| Add Course')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/alumniaccount">Course</a>
        </li>
        <li class="breadcrumb-item active">Course List</li>
      </ol>
      <!-- Icon Cards-->
     <!--  start of AlumniTable -->
       <div class="row">
    <div class="col-md-10">
          <h1>All Course</h1>
    </div>
    <div class="col-md-2">
      <a href="{{route('course.create')}}" class="btn btn-lg btn-block btn-primary">Add new Course</a>
    </div>
    <div class="col-md-12">
    <hr>
    </div>
  </div>
          <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
        
          <th>Course</th>
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
            @foreach ($courses as $course)

          <tr>
            
            <td>{{ $course->name }}</td>
            <td>{{ date('M j, Y', strtotime($course->created_at)) }}</td>
            <td><a href="{{route('course.show', $course->id)}}" class="btn btn-default btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View </a></td>
            
        

          @endforeach
         
        </tbody>
      </table>
      <div class="text-center">
       
      </div>
    </div>
  </div>
          
     
@endsection
