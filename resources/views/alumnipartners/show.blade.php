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
        <li class="breadcrumb-item active">View Alumni Partner</li>
      </ol>

    
      
     <center>
   <div class="row">
    <div class="col-md-6">
      @if ($partners->image == '')
      @else
      <img src="{{ asset('images/'. $partners->image)}}" width="300" height="300">
      @endif
     <h1>Company Name: {{ $partners->title }}</h1>
    <p class="lead">Descrition: {{ $partners->description }}</p>
     <p class="lead">Contact No.: {{ $partners->contact }}</p>
    <p class="lead">Email: {{ $partners->email }}</p>
     <p class="lead">Location: {{ $partners->location }}</p>
      <p class="lead">Branches: {{ $partners->branches }}</p>
  </div>
  <div class="col-md-4">
    <div class="well" style="background-color: #f8f8f8">
      <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($partners->created_at)) }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($partners->updated_at)) }}</dd>
      </dl>
      <hr>

      <div class="row">
        <div class="col-sm-6">
          <a href="{{ route('alumnipartners.edit', $partners->id) }}" class="btn btn-primary btn-block">Edit</a>
          <hr>
        </div>
        <div class="col-sm-6">
          <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#deletemodal">Delete</button>
         
        </form>
        <hr>
      </div>
    </div>
      
      <div class="row">
          <div class="col-sm-12">
            <br>
            <a href="/alumnipartners" class="btn btn-success btn-default btn-block">>> Show all Posts</a>
            <br>
          </div>
        </div><!-- /.row -->﻿

            </div>
         

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
          <div class="modal-body">Are you sure you want to delete this post?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             <form method="POST" action="{{route('alumnipartners.destroy', $partners->id)}}">
            <input type="submit" value="Delete" class="btn btn-danger btn-block">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
           {{ method_field('DELETE') }}
         </form>
          </div>
        </div>
      </div>
    </div>
   @endsection