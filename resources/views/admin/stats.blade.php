@extends('adminlayouts.main')

@section('title','| Dashboard')


@section('content')

{!! Charts::scripts() !!}
    <script type="text/javascript">

                $(function() {
            $("#graph_select").change(function() {
             
              if ($("#pilot_form").is(":selected")) {
                $("#client_graph_form").hide();
                $("#alumni_graph_year").hide();
                $("#alumni_graph_course").hide();
                $("#employeecourse").show();


                              $("#employeecourse").change(function() {

                              if ($("#allcourse").is(":selected")) {
                               $("#pilot_graph_form").show();
                               $("#employedcourseform").hide();
                               $("#underemployedcourseform").hide();
                               $("#undemployedcourseform").hide();

                            
                            }else if ($("#employedcourse").is(":selected")) {
                                $("#pilot_graph_form").hide();
                                $("#employedcourseform").show();
                               $("#underemployedcourseform").hide();
                               $("#undemployedcourseform").hide();
                            }else if ($("#underemployedcourse").is(":selected")) {
                              $("#pilot_graph_form").hide();
                              $("#employedcourseform").hide();
                               $("#underemployedcourseform").show();
                               $("#undemployedcourseform").hide();
                            // }else if ($("#{{$courses[0]->name}}").is(":selected")) {
                            //   $("#pilot_graph_form").hide();
                            //   $("#employedcourseform").hide();
                            //    $("#underemployedcourseform").hide();
                            //    $("#undemployedcourseform").hide();
                            //    $("#chartcourseemployeeform").hide();

                            }else{
                               $("#pilot_graph_form").hide();
                                $("#employedcourseform").hide();
                               $("#underemployedcourseform").hide();
                               $("#undemployedcourseform").show();
                            }

                              }).trigger('change');


                    

              } else if ($("#client_form").is(":selected")) {
                $("#pilot_graph_form").hide();
                $("#client_graph_form").show();
                $("#alumni_graph_year").hide();
                $("#alumni_graph_course").hide();
                $("#employeecourse").hide();
                $("#employedcourseform").hide();
                $("#underemployedcourseform").hide();
                $("#undemployedcourseform").hide();
              } else if ($("#alumni_year").is(":selected")){
                $("#pilot_graph_form").hide();
                $("#client_graph_form").hide();
                $("#alumni_graph_year").show();
                $("#alumni_graph_course").hide();
                $("#employeecourse").hide();
                $("#employedcourseform").hide();
                $("#underemployedcourseform").hide();
                $("#undemployedcourseform").hide();
              }else{
                $("#pilot_graph_form").hide();
                $("#client_graph_form").hide();
                $("#alumni_graph_year").hide();
                $("#alumni_graph_course").show();
                $("#employeecourse").hide();
                $("#employedcourseform").hide();
                $("#underemployedcourseform").hide();
                $("#undemployedcourseform").hide();
              }
            }).trigger('change');
          });
    </script>
   


        
     
  <div class="content-wrapper">
    <!-- <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
     </div> -->
     <h4>Total Registered Alumni Account: {{$users->count('id')}}</h4>

     <div class="form-group">


      <select id="graph_select" class="form-control">
         <option id="alumni_course">By Course</option>
          <option id="alumni_year">By Year Graduated</option>
          <option id="pilot_form">Employment Status</option>
          <option id="client_form">By Campus</option>
          
        </select><br>
         <div class="col-md-3">
                      <select id="employeecourse" class="form-control">
                     <option id="allcourse">all</option>

                    
                      <option id="employedcourse">Employed</option>
                      <option id="underemployedcourse">Underemployed</option>
                      <option id="undemployedcourse">Unemployed</option>
                    </select>
          </div>
          
           


             <div id="employedcourseform" align="center" style="margin:0 auto; display:none;">
                <div align="right"><a href="/pdfempemployed" class="btn btn-info "> <i class="fa fa-fw fa-download"></i>Download PDF</a></div>

                <div>{!! $chartemployed->html() !!}</div>
                    {!! $chartemployed->script() !!} 

                     
            </div>


            <div id="underemployedcourseform" align="center" style="margin:0 auto; display:none;">
              <div align="right"><a href="/pdfunderemployed" class="btn btn-info "> <i class="fa fa-fw fa-download"></i>Download PDF</a></div>

               <div>{!! $chartunderemployed->html() !!}</div>
                    {!! $chartunderemployed->script() !!}  

                      
            </div>

            <div id="undemployedcourseform" align="center" style="margin:0 auto; display:none;">
              <div align="right"><a href="/pdfunemployed" class="btn btn-info "> <i class="fa fa-fw fa-download"></i>Download PDF</a></div> 

               <div>{!! $chartunemployed->html() !!}</div>
                    {!! $chartunemployed->script() !!}

                     
            </div>

            <div id="pilot_graph_form" align="center" style="margin:0 auto; display:none;">
              <div align="right"><a href="/pdfemploymentall" class="btn btn-info "> <i class="fa fa-fw fa-download"></i>Download PDF</a></div>

               <div>{!! $chart->html() !!}</div>
                    {!! $chart->script() !!}   

                    
            </div>
              
            <div id="client_graph_form" align="center" style="margin:0 auto; display:none;">
              <div align="right"><a href="/pdfcampus" class="btn btn-info "> <i class="fa fa-fw fa-download"></i>Download PDF</a></div>

              <div> {!! $chartcamp->html() !!}</div>
                    {!! $chartcamp->script() !!}

            </div>
              
            <div id="alumni_graph_year" align="center" style="margin:0 auto; display:none;">
              <div align="right"><a href="/pdfyeargrad" class="btn btn-info "> <i class="fa fa-fw fa-download"></i>Download PDF</a></div>

               <div> {!! $chartyear->html() !!}</div>
                    {!! $chartyear->script() !!}

                    
            </div>

            <div id="alumni_graph_course" align="center" style="margin:0 auto; display:none;">
              <div align="right"><a href="/pdfcourse" class="btn btn-info "> <i class="fa fa-fw fa-download"></i>Download PDF</a></div>

             <div> {!! $chartcourse->html() !!}</div>
                  {!! $chartcourse->script() !!}

                  
            </div>
 
    

     </div>

        <!-- End Of Main Application -->
@endsection   
        
         
         
     
    
  