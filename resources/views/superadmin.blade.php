@extends('superadminlayouts.main')
@section('content')
@include('flash::message')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Superadmin Dashboard</div>

                <div class="panel-body">
                  <table class="table">
        <thead>
        
          <th>Name</th>
          <th>Email</th>
          <th>Admin Position</th>
          <th>Campus</th>
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($admins as $admin)

          <tr>
            <td>{{ $admin->name }} {{$admin->middlename}} {{$admin->lastname}}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->adminposition }}</td>
            <td>{{ $admin->campus}}</td>
            <td>{{ date('M j, Y', strtotime($admin->created_at)) }}</td>

            <td><a href="/showsuperadmin/{{$admin->id}}" class="btn btn-default btn-sm btn-danger"><i class="fa fa-eye" aria-hidden="true"></i> View </a></td>
            </th>
          </tr>

          @endforeach
         
        </tbody>
      </table>
      <div class="text-center">
        {!! $admins->links(); !!}
      </div>
    
                      
                </div>
            </div>
        </div>
    </div>
</div>


 @endsection
