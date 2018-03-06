@extends('adminlayouts.main')

@section('title','| Alumni Partners')

@section('content')
 <!--  add alumni partners -->
          <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/postslist">Partners</a>
        </li>
        <li class="breadcrumb-item active">Add Alumni Partners</li>
      </ol>
  <!-- Start Creating new Post   --> 
      <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Add New Alumni Partners</h3></div>

                <div class="panel-body">
                  <form method="POST" action="{{ route('alumnipartners.store') }}" enctype="multipart/form-data">
                    <div class="form-group">
                      <label name="title">Name of the Company:</label>
                      <input id="title" name="title" class="form-control" required="" placeholder="Enter the name of the company" required>
                    </div>
                    <div class="form-group">
                      <label name="description">Description of the Company:</label>
                      <textarea id="description" name="description" rows="5" required="" class="form-control" placeholder="Say something about the company......."></textarea>
                    </div>
                    <div class="form-group">
                      <label name="contact">Contact Number / Email Address</label>
                      <input id="contact" name="contact" class="form-control" placeholder="Enter the Contact number/Email Address">
                    </div>
                    <div class="form-group">
                      <label name="email">Company Website</label>
                      <input type="text" name="email" class="form-control" placeholder="Enter the Company Website">
                    </div>
                    <div class="form-group">
                      <label name="location">Location:</label>
                      <input id="location" name="location" class="form-control" placeholder="Enter the Location">
                    </div>
                    <div class="form-group">
                      <label name="branches">Branch</label>
                      <input id="branches" name="branches" class="form-control" placeholder="Enter other Branch">
                    </div>
                  

                

                    <label for="featuredimage">Upload Image</label>
                    <input type="file" name="featuredimage">
                    <br>
                    <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </form>
                </div>
            </div>
        </div>
    </div>
 </div>
          
     
     
   @endsection
