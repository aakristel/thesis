@extends('alumnilayouts.nav')

@section('title','| Home')

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
      
    
      
     </div>
    
    <!-- Middle Column -->
   
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">

              @include('flash::message')
              <h3 class="w3-opacity">New Post</h3>

              <form method="POST" action="{{route('alumniposts.store', $user->id)}}" enctype="multipart/form-data">
                   <div class="form-group">
                     <!--  <input type="textarea" > -->
                      <label name="title"  class="w3-opacity">Title</label>
                       <input type="hidden" name="author" value=" {{ Auth::user()->name }}  {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}">

                      <textarea name="title" class="form-control" rows="2" placeholder="Share something....." style="resize:none; overflow-y: hidden; overflow-x: hidden;" required=""></textarea>
                  
                     <label name="subject"  class="w3-opacity">Subject</label>
                      <textarea name="subject" rows="5" class="form-control" placeholder="Share something....." style="resize:none; overflow-y: hidden; overflow-x: hidden;" required=""></textarea> 
                      
                    <label for="featuredimage" class="w3-opacity">Upload Banner</label>
                    <input type="file" name="featuredimage"><br>
                    <button type="submit" class=" btn btn-success btn-lg btn-default"><i class="glyphicon glyphicon-pencil"></i>Post</button>
                         <!-- <input type="submit" value="Post" class="btn btn-success btn-lg btn-default glyphicon glyphicon-pencil"> -->
                         <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </div>
                    
                  </form>
            </div>
          </div>
        </div>
      </div>




    @foreach($alumposts as $alumpost)
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
<!-- 
        <img src="/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"> -->
          
          <div class="post">
        <span class="w3-right w3-opacity">{{ date('M j, Y', strtotime($alumpost->created_at)) }}</span>
        <h4>{{ $alumpost->author }}</h4><br>
        <hr class="w3-clear">
        <h3>{{ $alumpost->title }}</h3>
        <p> {{ substr($alumpost->subject, 0, 300) }}{{ strlen($alumpost->subject) > 300 ? "....." : "" }}</p>
         @if ($alumpost->image == '')
                  
                @else
          <div class="w3-row-padding" style="margin:0 -16px">

           
              <img src="{{ asset('images/'. $alumpost->image)}}" style="width: 100%" class="w3-margin-bottom">
      

        </div>
        
         @endif
           <a href="/showalumni/{{$alumpost->id}}">Read More</a>
        </div> 
    
        
      </div>
   @endforeach
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><strong>Admin Posts:</strong></p>
           @foreach($posts as $post)
           <div class="post">
            @if ($post->image == '')
                  
            @else
          
          <img src="{{ asset('images/'.$post->image)}}" alt="{{$post->image}}" style="width: 100%">
        
          @endif
          <p><strong>{{ $post->title }}</strong></p>
          <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "....." : "" }}</p>
          <p> <a href="/show/{{$post->id}}" class="w3-button w3-block w3-theme-l4">Read More</a></p>
          </div><hr>
            @endforeach
            <div class="text-center">
                  {!! $posts->links(); !!}
                 </div>
        </div>
      </div>
      <br>
      
      
    <!-- End Right Column -->
    </div>
     <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><strong>Alumni Partners</strong></p>
            @foreach($partners as $partner)
                
           <div class="post">
            <p><strong>{{ $partner->title }}</strong></p>
            @if ($partner->image == '')
                  
            @else
          <img src="{{ asset('images/'. $partner->image)}}" style="width:100%;">
          @endif
          
          <p>{{ substr($partner->description, 0, 300) }}{{ strlen($partner->description) > 300 ? "....." : "" }}</p>
          <p>{{ $partner->email }}</p>
                  <p><a href="{{ $partner->contact }}"> {{ $partner->contact }}</a></p>
                  <p>{{ $partner->location }}</p>
                  <p>{{ $partner->branches }}</p>
          <p> <a href="/showpartner/{{$partner->id}}" class="w3-button w3-block w3-theme-l4">Read More</a></p>
          </div>
            @endforeach
          <div class="text-center">
                  {!! $partners->links(); !!}
          </div>
        </div>
      </div>
      <br>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->


@endsection