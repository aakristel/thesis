<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Alumpost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;
use Illuminate\Support\Str;
use Mail;
use App\Mail\verifyEmail;
use Auth;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/alumnitable';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Get a validator for an incoming registration request.s
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string|max:255',
            'birthday' => 'nullable|string',
            'address' => 'nullable|string',
            'civil' => 'nullable|string',
            'nationality' => 'nullable|string',
            'religion' => 'nullable|string',
            'course' => 'required|string|max:255',
            'contact' => 'nullable|string',
            'employment' => 'nullable|string',
            'gender' => 'required|string|max:255',
            'campus' => 'required|string|max:255',
            'yeargrad' => 'required|string|max:255',
            'username' => 'nullable|string',
         
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        $user = User::create([
            'name' => $data['name'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'civil' => $data['civil'],
            'nationality' => $data['nationality'],
            'religion' => $data['religion'],
            'course' => $data['course'],
            'contact' => $data['contact'],
            'employment' => $data['employment'],
            'gender' => $data['gender'],
            'campus' => $data['campus'],
            'yeargrad' => $data['yeargrad'],
            'username' => $data['username'],

    
          
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verifyToken' =>Str::random(40),

         
        ]);
        $thisUser = User::findOrfail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }

    public function verifyEmailFirst()
    {

       $users = User::orderBy('id', 'desc')->paginate(10);
         
        $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
         flash('Successfully added, Pls Check your Email to verify')->success();


         
        return view('admin.alumnitable', array('users' => $users, 'alumposts' => $alumposts, 'admin' => Auth::user()));
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }
    public function sendEmailDone($email, $verifyToken)
    {
        $user = User::where(['email' => $email])->first();
        return $user;
    }
}
