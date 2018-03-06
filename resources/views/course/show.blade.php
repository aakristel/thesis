@extends('adminlayouts.main')

@section('title','| Add campus')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="">Posts</a>
        </li>
        <li class="breadcrumb-item active">View Post</li>
      </ol>

    
      
     <center>
   <div class="row">
    <div class="col-md-6">
     
     <h1>{{ $courses->name }}</h1>
  
  </div>
  <div class="col-md-4">
    <div class="well" style="background-color: #f8f8f8">
      <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($courses->created_at)) }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($courses->updated_at)) }}</dd>
      </dl>
      <hr>

      <div class="row">
        
        <div class="col-sm-6">
          <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#deletemodal">Delete</button>
         
        </form>
        <hr>
      </div>
    </div>
    
      <div class="row">
          <div class="col-sm-12">
            <br>
            <a href="{{ route('course.index') }}" class="btn btn-success btn-default btn-block">>> Show all Posts</a>
            <br>
          </div>
        </div><!-- /.row -->﻿

         

        </div>
      </div>
      
    </div>
  </div>

  
  </center>

  </div>
  </div>

    

    <!-- Delete Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="declinemodal">Delete?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you sure you want to delete this Course?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             <form method="POST" action="{{route('course.destroy', $courses->id)}}">
            <input type="submit" value="Delete" class="btn btn-danger btn-block">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
           {{ method_field('DELETE') }}
          </div>
        </div>
      </div>
    </div>
  @endsection