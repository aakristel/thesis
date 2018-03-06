<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use flash;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Mail\verifyEmail;
class SuperadminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('created_at', 'desc')->paginate(10);
        return view('superadmin', array('admins' => $admins));
    }
     public function getAddadmin()
    {
         return view('superadmin.addadmin');
     }
     public function addadmin(Request $request)
    {
         $this->validate($request, array(
            'name' => 'required|max:255',
            'middlename' => 'max:255',
            'lastname' => 'required',
            'campus' => 'max:255',
            'adminposition' => 'required',
            'department' => 'required',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',

        ));
        $admin = new Admin();

        $admin->name = $request->name;
        $admin->middlename = $request->middlename;
        $admin->lastname = $request->lastname;
        $admin->campus = $request->campus;
        $admin->adminposition = $request->adminposition;
        $admin->department = $request->department;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->get('password'));
        $admin->save();
        flash('Successfuly Added')->success();
         // return redirect(route('verifyEmailFirstadmin'));
        //  $thisUser = Admin::findOrfail($admin->id);
        // $this->sendEmail($thisUser);
        // return $admin;
         return redirect()->route('superadmin.dashboard');
     }
     public function showadmin($id)
     {
        $admin = Admin::find($id);
        return view('superadmin.show', array('admin' => $admin));
     }
      public function deleteadmin($id){
        $admin = Admin::find($id);
        $admin->delete();
        flash('Successfuly Deleted')->warning();
        return redirect()->route('superadmin.dashboard');
      }

       public function getsearchsuperadmin(){
      $q = Input::get ( 'q' );
    $user = Admin::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('adminposition','LIKE','%'.$q.'%')->orWhere('lastname','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
  
    return view('superadmin.search')->withDetails($user)->withQuery( $q );
    else return view ('superadmin.search')->withMessage('No Details found. Try to search again !');
    }
    public function verifyEmailFirstadmin()
    {

         $admins = Admin::orderBy('created_at', 'desc')->paginate(10);
        return view('superadmin.dashboard', array('admins' => $admins, ));
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmailAdmin($thisUser));
    }
    public function sendEmailDone($email, $verifyToken)
    {
        $user = Admin::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
        return $user;
    }
}
