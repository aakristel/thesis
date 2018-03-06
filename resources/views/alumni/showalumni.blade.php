@extends('alumnilayouts.nav')
@section('title','| Alumni Post')

@section('content')




<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container"><br>
       @if ($user->image == '')
        <p class="w3-center"><img src="{{ asset('images/profile.png')}}" class="w3-circle" style="height:106px;width:106px" ></p>
      @else
         <p class="w3-center"><img src="{{ asset('images/'. $user->image)}}" class="w3-circle" style="height:106px;width:106px" ></p>
         @endif
          <h4 class="w3-center"><a href="/viewprofile/{{$user->id}}">{{ Auth::user()->name }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</a></h4>
         <hr>
         <p><i class="fa-fw w3-margin-right w3-text-theme"></i>Bio: {{ Auth::user()->bio }}</p>
         <p><i class="fa fa-address-card fa-fw w3-margin-right w3-text-theme"></i>Course: {{ Auth::user()->course }}</p>
         <p><i class="fa fa-institution fa-fw w3-margin-right w3-text-theme"></i>Campus: {{ Auth::user()->campus }}</p>
         <p><i class="fa fa-calendar-check-o fa-fw w3-margin-right w3-text-theme"></i>Year Graduated: {{ Auth::user()->yeargrad }}</p>
         <p><i class="fa fa-envelope-o fa-fw w3-margin-right w3-text-theme"></i> {{ Auth::user()->email }}</p>
         <p><i class="fa fa-address-book fa-fw w3-margin-right w3-text-theme"></i> {{ Auth::user()->contact }}</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> {{ Auth::user()->address }}</p>
         <p><i class="fa fa-anchor fa-fw w3-margin-right w3-text-theme"></i> {{ Auth::user()->gender }}</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>{{ Auth::user()->birthday }} </p>
         <p><i class="fa fa-paste fa-fw w3-margin-right w3-text-theme"></i>Employment Status: {{ Auth::user()->employment }} </p>
        </div>
      </div>
      <br>
      
    
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
   
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">

              @if($alumpost->image == '')
    @else
        <img src="{{ asset('images/'. $alumpost->image)}}" style="width: 100%">
      @endif
      <h1>Posted By: {{ $alumpost->author }}<h1> 
     <h1>{{ $alumpost->title }}</h1>
    <p class="lead">{{ $alumpost->subject }}</p>


          </div>
        </div>
      </div>
      </div>
    </div>
  




 <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <br>
        <label>Created at:</label>
        <p>{{ date('M j, Y h:ia', strtotime($alumpost->created_at)) }}</p><hr>
     <label>Last Updated:</label>
     <p>{{ date('M j, Y h:ia', strtotime($alumpost->updated_at)) }}</p>
           <a href="/home" class="btn btn-success btn-default btn-block">>> Home</a>

      <hr>

 

        </div>
      </div>
   
    </div>
    


@endsection




