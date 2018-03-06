@extends('adminlayouts.main')

@section('title','| Postslist')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
<div class="row">
	<div class="col-md-12">
    @if(isset($details))
        <p> You are looking for <b> {{ $query }} </b> are :</p>
    <h2>Alumni Partners</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Description</th>
                <th>Email</th>
                <th>Location</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($details as $users)
            <tr>
               <td> <a href="{{route('alumnipartners.show', $users->id)}}">{{$users->title}} </a></td>
                <td>{{$users->description}}</td>
                <td>{{$users->email}}</td>
                 <td>{{$users->location}}</td>
             
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</div>
</div>
</div>





@endsection