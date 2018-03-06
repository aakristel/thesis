@extends('adminlayouts.main')

@section('title','| Postslist')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
<div class="row">
	<div class="col-md-12">
    @if(isset($details))
        <p> You are looking for <b> {{ $query }} </b> are :</p>
    <h2>Admin Posts</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($details as $posts)
            <tr>
               <td> <a href="{{ route('posts.show', $posts->id) }}">{{$posts->title}} </a></td>
                <td>{{$posts->body}}</td>
             
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