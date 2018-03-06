@extends('superadminlayouts.main')
@section('content')




<div class="container">
    @if(isset($details))
        <p> You are looking for <b> {{ $query }} </b> are :</p>
    <h2>Alumni Users</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Year Graduated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
               <td> <a href="/showsuperadmin/{{$user->id}}">{{$user->name}} {{$user->middlename}} {{$user->lastname}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->adminposition}}</td>
             
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>



@endsection