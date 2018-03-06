@extends('adminlayouts.main')

@section('title','| Alumni Posts')

@section('content')
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/postslist">Alumni Post</a>
        </li>
        <li class="breadcrumb-item active">View Alumni Post</li>
      </ol>

    
      
     <center>
   <div class="row">
    <div class="col-md-6">
      @if ($alumnipost->image == '')
      @else
      <img src="{{ asset('images/'. $alumnipost->image)}}" width="300" height="300">
      @endif
     <h1>{{ $alumnipost->title }}</h1>
    <p class="lead">{{ $alumnipost->subject }}</p>
  </div>
  <div class="col-md-4">
    <div class="well" style="background-color: #f8f8f8">
      <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($alumnipost->created_at)) }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($alumnipost->updated_at)) }}</dd>
      </dl>
      <hr>

      <div class="row">
        
        <div class="col-sm-12">
          <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#deletemodal">Delete</button>
         
        </form>
        <hr>
      </div>
    </div>
      <div class="row">
         <div class="col-sm-6">
          <button class="btn btn-primary btn-block" id="approved" data-toggle="modal" data-target="#approvedmodal">Approved</button> 
      </div> 
      @if ($alumnipost->approved == 1)
      @else
      <div class="col-sm-6">
        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#declinemodal">Decline</button>
      </div>
      @endif
      </div>
      <div class="row">
          <div class="col-sm-12">
            <br>
            <a href="/postslistalumni" class="btn btn-success btn-default btn-block">>> Show all Posts</a>
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
          
     


    <!-- Approved Modal -->
    <div class="modal fade" id="approvedmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="approvedmodal">Approved?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form method="POST" action="{{route('alumniposts.approved', $alumnipost->id)}}" >
            {{ method_field('PUT') }}
          <div class="modal-body">If you click Approved the post will be seen to all users </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            
           <input type="submit" class="btn btn-primary" value="Approved">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
           </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Decline Modal -->
    <div class="modal fade" id="declinemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="declinemodal">Decline?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">If you click Decline this post will remain in Pending Status</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="/postslistalumni">Decline</a>
          </div>
        </div>
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
             <form method="POST" action="{{route('alumniposts.destroy', $alumnipost->id)}}">
            <input type="submit" value="Delete" class="btn btn-danger btn-block">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
           {{ method_field('DELETE') }}
         </form>
          </div>
        </div>
      </div>
    </div>
  @endsection