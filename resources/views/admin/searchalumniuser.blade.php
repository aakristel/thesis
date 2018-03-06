@extends('adminlayouts.main')

@section('title','| Postslist')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
<div class="row">
	<div class="col-md-12">
    @if(isset($details))
        <p> You are looking for <b> {{ $query }} </b> are :</p>
    <h2>Alumni Account</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Email</th>
                <th>Year Graduated</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($details as $users)
            <tr>
               <td> <a href="/viewalumni/{{$users->id}}">{{$users->name}} {{$users->lastname}} </a></td>
                <td>{{$users->course}}</td>
                <td>{{$users->email}}</td>
                 <td>{{$users->yeargrad}}</td>
             
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