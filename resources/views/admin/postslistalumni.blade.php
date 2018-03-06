@extends('adminlayouts.main')

@section('title','| Alumni Posts')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/postslistalumni">Alumni Posts</a>
        </li>
        <li class="breadcrumb-item active">Posts Lists</li>
      </ol>
    
      
     
  <div class="row">
    <div class="col-md-10 ">
          <h1>All Posts</h1>
         
    </div>
    <div class="col-md-12">
    <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <th>Author</th>
          <th>Title</th>
          <th>Body</th>
          <th>Status</th>
          <th>Created At:</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($alumpostsas as $alumpost)

          <tr>

            <td>{{ $alumpost->author }}</td>
            <td>{{ $alumpost->title }}</td>

            <td>{{ substr($alumpost->subject, 0, 50)  }}{{ strlen($alumpost->subject) > 50 ? "......" : "" }}</td>
             @if ($alumpost->approved == 1)
                        <td><label style="color: blue">Approved</label></td>
                    @else
                     <td><label style="color: red">Pending</label></td>
                
                    @endif
            <td>{{ date('M j, Y', strtotime($alumpost->created_at)) }}</td>

            <td><a href="/showalumniposts/{{$alumpost->id}}" class="btn btn-default btn-sm btn-danger"><i class="fa fa-eye" aria-hidden="true"></i> View </a>
           </td>
            </th>
          </tr>

          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {!! $alumpostsas->links(); !!}
      </div>
    </div>
  </div>
          
    
   @endsection
