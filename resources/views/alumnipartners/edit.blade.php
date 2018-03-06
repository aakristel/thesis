@extends('adminlayouts.main')

@section('title','| Alumni Partners')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/alumnipartners">Alumni Partners</a>
        </li>
        <li class="breadcrumb-item active">Update Alumni Partners</li>
      </ol>

    
      <div class="row">
    <div class="col-md-8">
   <form method="POST" action="{{ route('alumnipartners.update', $partner->id) }}" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title:</label>
        <textarea type="text" class="form-control input-lg" id="title" name="title" rows="1" style="resize:none; overflow-y: hidden; overflow-x: hidden;">{{ $partner->title }}</textarea>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea type="text" class="form-control input-lg" id="contact" name="description" rows="10" style="overflow-x: hidden; overflow-y: hidden;">{{ $partner->description }}</textarea>
      </div>
      <div class="form-group">
        <label for="contact">Contact No.:</label>
        <textarea type="text" class="form-control input-lg" id="contact" name="contact" rows="1" style="overflow: hidden;">{{ $partner->contact }}</textarea>
      </div>
      <div class="form-group">
        <label for="email">Email Address:</label>
        <textarea type="email" class="form-control input-lg" id="email" name="email" rows="1" style="overflow: hidden;">{{ $partner->email }}</textarea>
      </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <textarea type="text" class="form-control input-lg" id="location" name="location" rows="1" style="overflow: hidden;">{{ $partner->location }}</textarea>
      </div>
      <div class="form-group">
        <label for="branches">Other Branches:</label>
        <textarea type="text" class="form-control input-lg" id="branches" name="branches" rows="1" style="overflow: hidden;">{{ $partner->branches }}</textarea>
      </div>
       <img src="{{ asset('images/'. $partner->image)}}" width="300" height="300">
       <label for="featuredimage">Update Upload Image</label>
       <input type="file" name="featuredimage">
    </div>

    <div class="col-md-4">
      <div class="well" style="background-color: #f8f8f8">
        <dl class="dl-horizontal">
          <dt>Created at:</dt>
          <dd>{{ date('M j, Y h:i:sa', strtotime($partner->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last updated:</dt>
          <dd>{{ date('M j, Y h:i:sa', strtotime($partner->updated_at)) }}</dd>
        </dl>
        <hr>

        <div class="row">
          <div class="col-sm-6">
            <a href="{{ route('alumnipartners.show', $partner->id) }}" class="btn btn-primary btn-block">Cancel</a>
          </div>
          <div class="col-sm-6">
              <button type="submit" class="btn btn-success btn-block">Save</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              {{ method_field('PUT') }}
            </form>﻿
  </div>
     

  </div></div></div>

          
     
    @endsection