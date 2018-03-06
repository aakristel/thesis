@extends('adminlayouts.main')

@section('title','| Alumni Posts')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/postslist">Posts</a>
        </li>
        <li class="breadcrumb-item active">Edit Post</li>
      </ol>

    
      <div class="row">
    <div class="col-md-8">
   <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title:</label>
        <textarea type="text" class="form-control input-lg" id="title" name="title" rows="1" style="resize:none; overflow-x: hidden; overflow-y: hidden;">{{ $post->title }}</textarea>
      </div>
      <div class="form-group">
        <label for="body">Body:</label>
        <textarea type="text" class="form-control input-lg" id="body" name="body" rows="10" style="overflow-y: hidden; overflow-x: hidden;">{{ $post->body }}</textarea>
      </div>
       <img src="{{ asset('images/'. $post->image)}}" width="300" height="300">
       <label for="featuredimage">Update Upload Image</label>
       <input type="file" name="featuredimage">
    </div>

    <div class="col-md-4">
      <div class="well" style="background-color: #f8f8f8">
        <dl class="dl-horizontal">
          <dt>Created at:</dt>
          <dd>{{ date('M j, Y h:i:sa', strtotime($post->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last updated:</dt>
          <dd>{{ date('M j, Y h:i:sa', strtotime($post->updated_at)) }}</dd>
        </dl>
        <hr>

        <div class="row">
          <div class="col-sm-6">
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-block">Cancel</a>
          </div>
          <div class="col-sm-6">
              <button type="submit" class="btn btn-success btn-block">Save</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              {{ method_field('PUT') }}
            </form>﻿
  </div>
     

  </div></div></div>

          
   
@endsection
