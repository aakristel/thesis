<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Post;
use App\Partner;
use App\User;
use App\Alumpost;
use Charts;
use Auth;
use Image;
use App\Employment;
use Storage;
use Hash;
use App\Course;
use Illuminate\Notifications\Notification;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $post = Post::all();
        // $user = User::find($id);
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        $partners = Partner::orderBy('created_at', 'desc')->paginate(3);

        $posta = Post::all();
     

        $alumposts = Alumpost::where('approved', '1')->orderBy('created_at', 'desc')->limit(200)->get();

        return view('home', array('posts' => $posts, 'partners' => $partners, 'alumposts' => $alumposts, 'user' => Auth::user(), 'posta' => $posta, ));
    }
    public function getAbout()
    {
        return view('alumni.aboutus');
    }
    public function getContact()
    {
        return view('alumni.contactus');
    }
    public function viewProfile($id)
    {
        $users = User::find($id);
        $employment = Employment::find($id);
        $employments = Employment::find($id);
        $courses = Course::all();
       // $user = Auth::user()->orderBy('created_at', 'desc')->paginate(100);
        return view('alumni.viewprofile', array('users' => $users, 'user' => Auth::user(), 'employment' => $employment, 'employments' => $employments, 'courses' => $courses));
    }
    public function getShow($id)
    { 
      if ($post = Post::find($id)) {
        return view('alumni.show', array('post' => $post, 'user' => Auth::user(), ));
      }else{
          echo "<script>
                window.location.href='/home';
                alert('The post is already deleted');
                </script>";
        
      }

        
    }
    public function getShowalumnipost($id)
    {

      if ($alumpost = Alumpost::find($id)) {
        return view('alumni.showalumnipost', array('alumpost' => $alumpost, 'user' => Auth::user(),));
      }else{
         echo "<script>
                window.location.href='/home';
                alert('The post is already deleted');
                </script>";
      }

    }
    public function deletealumnipost($id)
    {
        $alumpost = Alumpost::find($id);

        Storage::delete($alumpost->image);//delete the photo
        $alumpost->delete();

        return redirect()->route('alumni.viewprofile', $alumpost->id);
    }
    public function getShowalumni($id)
    {
      if ($alumpost = Alumpost::find($id)) {
         return view('alumni.showalumni', array('alumpost' => $alumpost, 'user' => Auth::user(), ));
      }else{
        echo "<script>
                window.location.href='/home';
                alert('The post is already deleted');
                </script>";
      }
  
    }
    public function viewcoalumni($id)
    {
        $user = User::find($id);

        return view('alumni.viewcoalumni', array('user' => $user, ));
    }
    public function getShowpartner($id)
    {
      if ($partner = partner::find($id)) {
        return view('alumni.showpartner', array('partner' => $partner, 'user' => Auth::user(),));
      }else{
        echo "<script>
                window.location.href='/home';
                alert('The post is already deleted');
                </script>";
      }
    }

    public function updatefeaturedimage(Request $request, $id){

         if ($request->hasFile('featuredimage')) {
            $image = $request->file('featuredimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);

            $users = Auth::user();
            $users->image = $filename;
            $users->save();
        }

        return redirect()->route('alumni.viewprofile', $users->id);
    }
    public function getupdateprofile($id){
        $user = User::find($id);
        $courses = Course::all();
        return view('alumni.updateprofile', array('user' => Auth::user(), 'courses' => $courses ));
    }
    public function updateprofile(Request $request, $id)
    
    {
        $users = User::find($id);
        $this->validate($request, array(
            'name' => 'required|max:255',
            'middlename' => 'max:255',
            'lastname' => 'required',
            'bio' => 'max:255',
            'address' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'religion' => 'required',
            'employment' => 'required',
            'course' => 'required',
            'yeargrad' => 'required',
            'gender' => 'required',
            'username' => 'required',
            

            
        ));

        //save the data
         $users = User::find($id);

         $users->name = $request->input('name');
         $users->lastname = $request->input('lastname');
         $users->middlename = $request->input('middlename');
         $users->bio = $request->input('bio');
         $users->address = $request->input('address');
         $users->email = $request->input('email');
         $users->contact = $request->input('contact');
         $users->religion = $request->input('religion');
         $users->employment = $request->input('employment');
         $users->gender = $request->input('gender');
         $users->yeargrad = $request->input('yeargrad');
         $users->course = $request->input('course');
         $users->username = $request->input('username');

       
          $users->save();    

      
       return redirect()->route('alumni.viewprofile', $users->id);
    }
    public function getchart(){
        $user = User::all();
       return redirect()->route('home');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword', array('user' => Auth::user(), ));
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
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        // return redirect()->back()->with("success","Password changed successfully !");
        return redirect()->route('alumni.viewprofile', $user->id);
 
    }
    public function markAsRead(){
        
        auth()->user()->unreadNotifications->markAsRead();
        
        return redirect()->back();
    }

    public function getsearch(){
      $q = Input::get ( 'q' );
    $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('yeargrad','LIKE','%'.$q.'%')->orWhere('lastname','LIKE','%'.$q.'%')->orWhere('campus','LIKE','%'.$q.'%')->orWhere('course','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
  
    return view('alumni.search')->withDetails($user)->withQuery( $q );

    else return view ('alumni.search')->withMessage('No Details found. Try to search again !');
    }


    
    public function notif($id){
      
     $notification = Auth::user()->notifications()->findOrFail($id);
     
      
    
      $notification->markAsRead();
    // $post = Post::find($id);
        // $notification->data['action'];
    return back();
    //     return view('alumni.show', array('post' => $post, 'user' => Auth::user(),));
       // return view('alumni.show', array('post' => $post, 'user' => Auth::user(),));

     }
}
