@extends('adminlayouts.main')

@section('title','| Register Alumni')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/alumniaccount">Alumni Register</a>
        </li>
        <li class="breadcrumb-item active">Alumni Account</li>
      </ol>
      <!-- Start of Alumni Account -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Register</h1></div>
                
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" name="form1">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"> <i class="fa fa-fw fa-asterisk" style="color: red"></i>Firstname:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your Firstname">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="middlename" class="col-md-4 control-label">Middlename:</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control" name="middlename" placeholder="Enter your Middlename">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Lastname:</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" required placeholder="Enter your Lastname">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-md-4 control-label">Birthday:</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control" name="birthday">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Gender:</label>

                            <div class="col-md-6">
                               <select name="gender" class="form-control">
                                 <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Home Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" placeholder="Enter your Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="campus" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Campus</label>

                            <div class="col-md-6">
                               <select name="campus" class="form-control">
                                @foreach($camps as $campss)
                                <option value="{{$campss->title}}">{{$campss->title}}</option>
                                  @endforeach
                                </select>
                                 <a href="{{route('campus.index')}}" class="btn btn-primary">Add new Campus</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="yeargrad" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Year Graduated</label>

                            <div class="col-md-6">
                                <input id="yeargrad" class="form-control date-own" type="number" name="yeargrad" required="" placeholder="1999">
                            </div>
                             


                          <script type="text/javascript">
                              $('.date-own').datepicker({
                                 minViewMode: 2,
                                 format: 'yyyy'
                               });
                          </script>

                        </div>
                        <div class="form-group">
                            <label for="course" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Course:</label>

                            <div class="col-md-6">
                                 
                                <select name="course" class="form-control">
                               @foreach($courses as $course)
                                <option value="{{$course->name}}">{{$course->name}}</option>
                                  @endforeach
                              </select>
                            
                              <a href="{{route('course.index')}}" class="btn btn-primary">Add Course</a>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="civil" class="col-md-4 control-label">Civil Status:</label>

                            <div class="col-md-6">
                                <select name="civil" class="form-control">
                                <option value=""></option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Seperated">Separated</option>
                                <option value="Widowed">Widowed</option>
                                 <option value="Single">Single</option>
                              </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="employment" class="col-md-4 control-label">Employment Status:</label>

                            <div class="col-md-6">
                                <option value=""></option>
                                <option value="Employed">Employed</option>
                                <option value="Unemployed">Unemployed</option>
                                <option value="Underemployment">Underemployment</option>
                              </select>
                        </div>
                       </div>
                        <div class="form-group">
                            <label for="nationality" class="col-md-4 control-label">Nationality</label>

                            <div class="col-md-6">
                                <input id="nationality" type="string" class="form-control" name="nationality" placeholder="Enter your Nationality">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="religion" class="col-md-4 control-label">Religion</label>

                            <div class="col-md-6">
                                <input id="religion" type="string" class="form-control" name="religion" placeholder="Enter your Religion">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="contact" class="col-md-4 control-label">Contact Number</label>
                            <div class="col-md-6">
                                <input id="contact" type="number" class="form-control" name="contact" placeholder="Enter your Contact Number" />
                            </div>
                           


                        </div>
                       

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter your Email Address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Industry</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" placeholder="Enter Industry">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Password <p style="color: red">Your Password must be atleast 6 characters long. 
                            Pls Use Alumni No. in Setting up there Password</p></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"><i class="fa fa-fw fa-asterisk" style="color: red"></i>Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="_token" value="{{ Session::token() }}">
                                    Register
                                </button>
                                

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

     
         
      
          
     
@endsection