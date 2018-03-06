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
        <li class="breadcrumb-item active">Add new Course</li>
      </ol>
      <!-- Icon Cards-->
     <!--  start of AlumniTable -->
     <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Add new Course</h2></div>

                <div class="panel-body">
                  <form method="POST" action="{{ route('course.store') }}">
                    <div class="form-group">
                      <label name="name">Course:</label>
                      <input id="name" name="name" class="form-control" placeholder="Enter new Course" required>
                    </div>

                    <input type="submit" value="Save Course" class="btn btn-success btn-lg btn-block">
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

          
     
    @endsection
