@extends('adminlayouts.main')

@section('title','| New Posts')


@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/alumniaccount">New Post</a>
        </li>
        <li class="breadcrumb-item active">Create new Post</li>
      </ol>
      <!-- Start of Alumni Account -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Create New Post</h2></div>

                <div class="panel-body">
                  <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    <div class="form-group">
                      <label name="title">Title:</label>
                      <input id="title" name="title" class="form-control" placeholder="Enter the name of your post" required>
                    </div>
                  

                    <div class="form-group">
                      <label name="body">Subject:</label>
                      <textarea id="body" name="body" rows="10" class="form-control" placeholder="Say something about your post..." required></textarea>
                    </div>

                    <label for="featuredimage">Upload Image</label>
                    <input type="file" name="featuredimage" multiple>
                    

                    <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
  var form = document.getElementById('upload');
  var request = new XMLHttpRequest();

  form.addEventListener('submit', function(e){
    e.preventDefault();
    var formdata = new FormData(form);
    request.open('post', '/upload');
    request.addEventListener("load", transferComplete);
    request.send(formdata);
  });

  function transferComplete(data){
    console.log(data.currentTarget.response);
  }

</script> -->
     
         
      
          
     
  @endsection
