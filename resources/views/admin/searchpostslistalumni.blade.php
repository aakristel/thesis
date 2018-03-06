@extends('adminlayouts.main')

@section('title','| Postslist')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
<div class="row">
	<div class="col-md-12">
    @if(isset($details))
        <p> You are looking for <b> {{ $query }} </b> are :</p>
    <h2>Alumni Posts</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Author</th>
                <th>Title</th>
                <th>Body</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($details as $alumposts)
            <tr>
                <td>{{$alumposts->author}}</td>
               <td> <a href="/showalumniposts/{{$alumposts->id}}">{{$alumposts->title}} </a></td>
                <td>{{$alumposts->subject}}</td>
                <td>{{$alumposts->status}}</td>
             
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