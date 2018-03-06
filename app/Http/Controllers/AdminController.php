<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Alumpost;
use App\Course;
use App\Camp;
use Charts;
use DB;
use Auth;
use Storage;
use App\Admin;
use flash;
use Hash;
use App\Partner;
use Illuminate\Support\Facades\Input;
use Notification;
use App\Notifications\Alumpostnotif;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $chart = Charts::database(User::all(), 'donut', 'highcharts') //employment Status
                  ->title("Employment Status")
                  ->elementLabel("Total Alumni")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('employment');

         $chartcamp = Charts::database(User::all(), 'bar', 'highcharts') //Campus User
                  ->title("No. of Alumni per Campus")
                  ->elementLabel("Total Alumni")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('campus');

         $chartyear = Charts::database(User::orderBy('yeargrad', 'asc')->get(), 'area', 'chartjs') //Year Graduated
                  ->title("No. of Alumni per Year Graduated")
                  ->elementLabel("Total Alumni")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('yeargrad');


         $chartcourse = Charts::database(User::all(), 'area', 'chartjs') //Course User
                  ->title("No. of Alumni per Course")
                  ->elementLabel("Total Alumni")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('course');



          $chartemployed = Charts::database(User::all()->where('employment', 'Employed'), 'line', 'highcharts') //By Course for Employed User
                  ->title("No. of Alumni that are Employed")
                  ->elementLabel("Total Alumni that are Employed")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('course');

          $chartunemployed = Charts::database(User::all()->where('employment', 'Unemployed'), 'line', 'highcharts') //By Course for UnEmployed User
                  ->title("No. of Alumni that are Unemployed")
                  ->elementLabel("Total Alumni that are Unemployed")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('course');

          $chartunderemployed = Charts::database(User::all()->where('employment', 'Underemployment'), 'line', 'highcharts') //By Course for UnderEmployed User
                  ->title("No. of Alumni that are Underemployed")
                  ->elementLabel("Total Alumni that are Underemployed")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('course');


          //         $userss = DB::table('Users')
          //           ->where('course', 'BSIT')
          //           ->where('course', 'BSIT')
          //           ->get();



          // $chartcourseemployee = Charts::database($userss, 'donut', 'highcharts') //By Course for UnderEmployed User
          //         ->title("No. of Alumni")
          //         ->elementLabel("Total Alumni that are Underemployed")
          //         ->dimensions(1000, 500)
          //         ->responsive(false)
          //         ->groupBy('employment');


        $users = User::all();
        $courses = Course::all();  
        $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100); 

       return view('admin.stats', array('users' => $users, 'courses' => $courses, 'chart' => $chart, 'chartcamp' => $chartcamp, 'chartyear' => $chartyear, 'chartcourse' => $chartcourse, 'alumposts' => $alumposts, 'chartemployed' => $chartemployed, 'chartunemployed' => $chartunemployed, 'chartunderemployed' => $chartunderemployed,'admin' => Auth::user(),  ));
    }
    public function getCreatePost()
    {
        return view ('posts.create');
    }
    public function getAlumnitable()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
         
        $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('admin.alumnitable', array('users' => $users, 'alumposts' => $alumposts, 'admin' => Auth::user() ));
    
    }
    public function getPostslist()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
       $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('admin.postslist', array('posts' => $posts, 'alumposts' => $alumposts,'admin' => Auth::user()));
        // return view ('admin.postslist');
    }
    public function getPostslistalumni()
    {
      
        $user = User::all();
        $alumpostsas = Alumpost::orderBy('id', 'desc')->paginate(10);
         $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('admin.postslistalumni', array('alumposts' => $alumposts, 'alumpostsas' => $alumpostsas, 'user' => $user, 'admin' => Auth::user()));
        // return view ('admin.postslist', array('alumposts' => $alumposts, ));
    }
     public function getAlumniaccount()
    {
        $courses = Course::all();  
        $camps = Camp::all();
         $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100); 
         return view ('admin.alumniaccount', array('camps' => $camps, 'courses' => $courses, 'alumposts' => $alumposts, 'admin' => Auth::user()));
    }
    public function getAlumnipartners()
    {
       
         return view ('admin.alumnipartners');
    }

    public function viewalumni($id){
      $user = User::find($id);
      return view ('admin.viewalumni', array('user' => $user, 'admin' => Auth::user()));
    }


    public function getApproved(Request $request, $id)
    {

      $alumnipostsa = Alumpost::find($id);
       $this->validate($request, array(
            
            'approved' => 'max:255'
          

        ));

       $alumnipostsa = Alumpost::find($id);
        $alumnipostsa->approved = true;
        $alumnipostsa->save();

         Notification::send(User::all(), new Alumpostnotif($alumnipostsa));

          return redirect()->route('admin.postslistalumni', $alumnipostsa->id);
        
    }
    public function destroy($id) // this will destroy alumniposts
    {
        $alumpost = Alumpost::find($id);
        Storage::delete($alumpost->image);//delete the photo
        $alumpost->delete();

        return redirect()->route('admin.postslistalumni', $alumpost->id);
    }
     public function adminregister(Request $request) // add user
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'middlename' => 'nullable|max:255',
            'lastname' => 'string|max:255',
            'birthday' => 'string|max:255',
            'address' => 'string|max:255',
            'civil' => 'string|max:255',
            'nationality' => 'string|max:255',
            'religion' => 'string|max:255',
            'course' => 'string|max:255',
            'contact' => 'string|max:255',
            'employment' => 'string|max:255',
            'gender' => 'string|max:255',
            'campus' => 'string|max:255',
            'yeargrad' => 'string|max:255',
            'username' => 'string|max:255',
         
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $users = User::create($request->all());
       
        flash('Successfully added')->success();

        return redirect()->route('admin.alumnitable', $users->id);
    }
     public function getshowalumniposts($id){

      $alumnipost = Alumpost::find($id);

      $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);

    return view('alumniposts.show', array('alumnipost' => $alumnipost, 'alumposts' => $alumposts,'admin' => Auth::user() ));

     }
     public function deletealumni($id){

      $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.alumnitable', $user->id);
    

     }

     public function getshowaccount($id)
     {
     $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
      $admin = Admin::find($id);
      $camps = Camp::all();
      return view('admin.myaccount', array('admin' => Auth::user(), 'alumposts' => $alumposts, 'camps' => $camps));
     }
     public function updatemyaccount(Request $request, $id)
     {
      $admin = Admin::find($id);
        $this->validate($request, array(
            'name' => 'required|max:255',
            'middlename' => 'max:255',
            'lastname' => 'required',
            'adminposition' => 'max:255',
            'campus' => 'required',
            'email' => 'required',
            'department' => 'required',
            
        ));

        //save the data
         $admin = Admin::find($id);
         
         $admin->name = $request->input('name');
         $admin->lastname = $request->input('lastname');
         $admin->middlename = $request->input('middlename');
         $admin->adminposition = $request->input('adminposition');
         $admin->campus = $request->input('campus');
         $admin->email = $request->input('email');
         $admin->department = $request->input('department');

       
          $admin->save();    

       flash('Successfuly Updated')->success();
       return redirect()->route('myaccount', $admin->id);
     }

     public function showChangePasswordForm(){
      $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('admin.changepassword', array('admin' => Auth::user(), 'alumposts' => $alumposts));
    }
    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }


         $this->validate($request, array(
                'current-password' => 'required',
                'new-password' => 'required|string|min:6|confirmed',
         ));
        //Change Password
        $admin = Auth::user();
        $admin->password = bcrypt($request->get('new-password'));
        $admin->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
        // return redirect()->route('myaccount', $admin->id);
 
    }
    public function getsearchpostslist()
    {
      $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
      $q = Input::get ( 'q' );
    $posts = Post::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->get();
    if(count($posts) > 0)
  
    return view('admin.searchpostslist', array('admin' => Auth::user(), 'alumposts' => $alumposts))->withDetails($posts)->withQuery( $q );
    else return view ('admin.searchpostslist', array('admin' => Auth::user(), 'alumposts' => $alumposts))->withMessage('No Details found. Try to search again !');
    }
    public function getsearchalumniuser()
    {
      $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
       $q = Input::get ( 'q' );
    $users = User::where('name','LIKE','%'.$q.'%')->orWhere('lastname','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('course','LIKE','%'.$q.'%')->orWhere('yeargrad','LIKE','%'.$q.'%')->get();
    if(count($users) > 0)
  
    return view('admin.searchalumniuser', array('admin' => Auth::user(), 'alumposts' => $alumposts))->withDetails($users)->withQuery( $q );
    else return view ('admin.searchalumniuser', array('admin' => Auth::user(), 'alumposts' => $alumposts))->withMessage('No Details found. Try to search again !');
    }
    public function getsearchalumnipartners()
    {
      $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
       $q = Input::get ( 'q' );
    $users = Partner::where('title','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('location','LIKE','%'.$q.'%')->get();
    if(count($users) > 0)
  
    return view('admin.searchalumnipartner', array('admin' => Auth::user(), 'alumposts' => $alumposts))->withDetails($users)->withQuery( $q );
    else 
      return view ('admin.searchalumnipartner', array('admin' => Auth::user(), 'alumposts' => $alumposts))->withMessage('No Details found. Try to search again !');
    }
      public function getupdateprofileuser($id){
        $user = User::find($id);
        $courses = Course::all();
        return view('admin.updateprofileuser', array('user' => $user, 'courses' => $courses ));
    }
    public function updateprofileuser(Request $request, $id)
    
    {
        $users = User::find($id);
        $this->validate($request, array(
            'course' => 'required',
            'yeargrad' => 'required',    
        ));

        //save the data
         $users = User::find($id);

         $users->yeargrad = $request->input('yeargrad');
         $users->course = $request->input('course');
      
          $users->save();    

      
       return redirect()->route('admin.viewalumni', $users->id);
    }

}

