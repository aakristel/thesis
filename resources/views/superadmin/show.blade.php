@extends('superadminlayouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Superadmin Dashboard</div>

                <div class="panel-body">
                   <h2>Name: {{$admin->name}} {{$admin->middlename}} {{$admin->lastname}}</h2>
                  <h3>Admin Position: {{$admin->adminposition}}</h3>
                  <h3>Campus: {{$admin->campus}}</h3>
                  <h3>Email: {{$admin->email}}</h3>
                  <h3>Course Department: {{$admin->department}}</h3>
    
                   <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#deletemodal">Delete</button>   
                </div>
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
          <div class="modal-body">Are you sure you want to delete this Alumni Admin?</div>
          <div class="modal-footer">
            
             <form method="POST" action="{{route('deleteadmin', $admin->id)}}">
            <input type="submit" value="Delete" class="btn btn-danger">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           {{ method_field('DELETE') }}
         </form>
          </div>
        </div>
      </div>
    </div>

@endsection

