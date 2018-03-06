@extends('adminlayouts.main')

@section('title','| Alumni Partners')

@section('content')

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/partners">Alumni Partners</a>
        </li>
        <li class="breadcrumb-item active">Alumni Partners List</li>
      </ol>
      <!-- Icon Cards-->
     <!--  start of AlumniPartners -->
          <div class="row">
    <div class="col-md-9">
          <h1>All Alumni Partners</h1>
          <form class="form-inline my-2 my-lg-0 mr-lg-2" action="/searchalumnipartners" method="POST" role="search">
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
    <div class="col-md-3">
      <a href="{{route('alumnipartners.create')}}" class="btn btn-block btn-primary">Create new Alumni Partners</a>
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
          <th>Description</th>
          <th>Location</th>
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
         @foreach ($partners as $partner)

          <tr>
    
            <td>{{ $partner->title }}</td>
            <td>{{ substr($partner->description, 0, 50)  }}{{ strlen($partner->description) > 50 ? "......" : "" }}</td>
            <td>{{ substr($partner->location, 0, 50)  }}{{ strlen($partner->location) > 50 ? "......" : "" }}</td>
            <td>{{ date('M j, Y', strtotime($partner->created_at)) }}</td>
          
            <td><a href="{{route('alumnipartners.show', $partner->id)}}" class="btn btn-default btn-sm btn-danger"><span class="glyphicon glyphicon-pencil"></span><i class="fa fa-eye" aria-hidden="true"></i> View </a></td>
             
            </th>
          </tr>

          @endforeach
        </tbody>
      </table>
      <div class="text-center">
         {!! $partners->links(); !!}
     
      </div>
    </div>
  </div>
          
     
    @endsection
