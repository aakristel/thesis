<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Admin;
class SuperadminLoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:superadmin', ['except' => ['logout']]);
    }
     Public function showLoginForm()
    {
    	return view('auth.superadminlogin');
    }
    
    // Public function register(Request $request)
    // {   
    //      $this->validate($request, array(
    //          'name' => 'required|string|max:255',
    //         'middlename' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'contact' => 'required|string|max:255',
    //         'username' => 'required|string|max:255',
    //         'adminposition' => 'required|string|max:255',
    //         'campus' => 'required|string|max:255',
    //         'birthday' => 'required|string|max:255',
    //         'gender' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'civil' => 'required|string|max:255',
    //         'password' => 'required|string|min:6|confirmed',
    //      ));
    //      $admin = new Admin;

    //      $admin->name = $request->name;
    //      $admin->middlename = $request->middlename;
    //      $admin->lastname = $request->lastname;
    //      $admin->email = $request->email;
    //      $admin->contact = $request->contact;
    //      $admin->username = $request->username;
    //      $admin->adminposition = $request->adminposition;
    //      $admin->campus = $request->campus;
    //      $admin->birthday = $request->birthday;
    //      $admin->gender = $request->gender;
    //      $admin->address = $request->civil;
    //      $admin->password = $request->password;

    //      $admin->save();
        
    //     return view('superadmin.addadmin');
    // }

    Public function login(Request $request)
    {
        //validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);
        //attempt to log user
        

        if (Auth::guard('superadmin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
           //if successful
            return redirect()->intended(route('superadmin.dashboard'));
        }
        //if unsuccessful
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('superadmin')->logout();
        return redirect()->route('superadmin.login');
    }
}
