@extends('superadminlayouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register an Alumni Admin</div>

                <div class="panel-body">

                    <form method="POST" action="{{ route('admin.add') }}">
                  <div class="form-group">
                    <div class="col-md-4">
                        <label for="name">Firstname:</label>
                    <input type="text" name="name" class="form-control" placeholder="Firstname">
                    </div>
                     <div class="col-md-4">
                        <label for="middlename">Middlename:</label>
                    <input type="text" name="middlename" class="form-control" placeholder="Middlename">
                    </div>
                     <div class="col-md-4">
                        <label for="lastname">Lastname:</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                    <br>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                                  <label for="adminposition">Admin Position:</label>
                                  <input type="text" name="adminposition" class="form-control" placeholder="Enter Admin Position">

                                </div>
                  </div>
                   <div class="col-md-6">
                        <div class="form-group">
                                  <label for="campus">OLFU Campus:</label>
                                  <input type="text" name="campus" class="form-control" placeholder="Enter Campus">
                                 </div>
                  </div>

                  <div class="col-md-6">

                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                         <div class="col-md-6">
                    <label for="department">Course Department</label>
                    <input type="text" class="form-control" name="department" placeholder="Enter Course Department">
                     <br>
                    </div>
                     <br>
            
                   
                  
                         <div class="col-md-6">
                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label><p style="color: red">Your Password must be atleast 6 characters long. 
                            Pls Use ID No.</p>

                        
                                <input id="password" type="password" class="form-control" name="password" required><br>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required><br>
                            </div>
                        </div>
                 
                  <button type="submit" class="btn btn-primary btn-default btn-block">Save</button>
                   <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </div>
                  
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

