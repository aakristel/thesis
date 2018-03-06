@extends('adminlayouts.main')

@section('title','| Admin Posts')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/postslist">Posts</a>
        </li>
        <li class="breadcrumb-item active">Posts Lists</li>
      </ol>
    
@include('flash::message')
      
     
  <div class="row">
    <div class="col-md-10">
          <h1>All Posts</h1>
          <form class="form-inline my-2 my-lg-0 mr-lg-2" action="/searchpostslist" method="POST" role="search">
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
      <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">Create new post</a>
    </div>
    <div class="col-md-12">
    <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
 
          <th>Title</th>
          <th>Body</th>
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($posts as $post)

          <tr>
           
            <td>{{ $post->title }}</td>
            <td>{{ substr($post->body, 0, 50)  }}{{ strlen($post->body) > 50 ? "......" : "" }}</td>
            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm btn-danger"><i class="fa fa-eye" aria-hidden="true"></i> View </a>  <a href="{{ route('posts.edit', $post->id) }}" class=" btn btn-default btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a></td>
            </th>
          </tr>

          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {!! $posts->links(); !!}
      </div>
    </div>
  </div>
          
     
  
    @endsection