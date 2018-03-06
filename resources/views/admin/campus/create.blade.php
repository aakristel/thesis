@extends('adminlayouts.main')

@section('title','| Add campus')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/alumniaccount">Course</a>
        </li>
        <li class="breadcrumb-item active">Add new Campus</li>
      </ol>
      <!-- Icon Cards-->
     <!--  start of AlumniTable -->
     <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Add new Campus</h2></div>

                <div class="panel-body">
                  <form method="POST" action="{{ route('campus.store') }}">
                    <div class="form-group">
                      <label name="title">Campus:</label>
                      <input id="title" name="title" class="form-control" placeholder="Enter new Campus" required>
                    </div>

                    <input type="submit" value="Save Campus" class="btn btn-success btn-lg btn-block">
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
          
 

