<?php
use Illuminate\Support\Facades\Input;
use App\User;
use App\Post;
use App\Partner;
use Illuminate\Http\Request;
use App\Mail;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//HomeController is for Alumni User
//AdminController is for Admin User
//SuperadminController is for Superadmin User
//PostController is for Posting 


Route::get('/chat', function(){
	return view('chat');
});
 Route::get('/notifications/{id}','HomeController@notif');


//Searc in Alumni Site
// Route::any('/search',function(){
//     $q = Input::get ( 'q' );
//     $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('yeargrad','LIKE','%'.$q.'%')->orWhere('lastname','LIKE','%'.$q.'%')->get();
//     if(count($user) > 0)
	
//     return view('chart')->withDetails($user)->withQuery( $q );
//     else return view ('chart')->withMessage('No Details found. Try to search again !');
// });

 Route::get('/markAsRead', function(){
 	 Auth()->user()->unreadNotifications->markAsRead();

 	// $notification = Auth::user()->notifications()->findOrFail($id);
  //     $notification->markAsRead();
 });

Route::any('searchalumni', 'HomeController@getsearch')->name('searchalumni');
Route::any('searchsuperadmin', 'SuperadminController@getsearchsuperadmin')->name('searchsuperadmin');
Route::any('searchpostslist', 'AdminController@getsearchpostslist')->name('searchpostslist');
Route::any('searchalumniuser', 'AdminController@getsearchalumniuser')->name('searchalumniuser');
Route::any('searchalumnipartners', 'AdminController@getsearchalumnipartners')->name('searchalumnipartners');

// Route::any('searchpostslistalumni', 'AdminController@getsearchpostslistalumni')->name('searchpostslistalumni');

//for verify email
Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verifyEmailFirstadmin', 'SuperadminController@verifyEmailFirstadmin')->name('verifyEmailFirstadmin');
// Route::get('verify/{email}/{verifyToken}', 'Auth/RegisterController@sendEmailDone')->name('sendEmailDone');


//Sending Email
Route::get('mail', 'MailController@send');

//PDF
Route::get('pdfcourse', 'PDFController@pdfcourse');
Route::get('pdfcampus', 'PDFController@pdfcampus');
Route::get('pdfyeargrad', 'PDFController@pdfyeargrad');
Route::get('pdfemploymentall', 'PDFController@pdfemploymentall');
Route::get('pdfempemployed', 'PDFController@pdfempemployed');
Route::get('pdfunderemployed', 'PDFController@pdfunderemployed');
Route::get('pdfunemployed', 'PDFController@pdfunemployed');


//Employments

Route::post('employmets/{user_id}', ['uses' => 'EmploymentsController@store', 'as' => 'employments.store']);
Route::get('employmets/{id}/edit', ['uses' => 'EmploymentsController@edit', 'as' => 'employments.edit']);
Route::put('employmets/{id}', ['uses' => 'EmploymentsController@update', 'as' => 'employments.update']);
Route::delete('employmets/{id}', ['uses' => 'EmploymentsController@destroy', 'as' => 'employments.destroy']);
Route::get('employments/{id}/delete', ['uses' => 'EmploymentsController@delete', 'as' =>'employments.delete']);

//Hobby
Route::post('hobbies/{user_id}', ['uses' => 'HobbyController@store', 'as' => 'hobbies.store']);
Route::get('hobbies/{id}/edit', ['uses' => 'HobbyController@edit', 'as' => 'hobbies.edit']);
Route::put('hobbies/{id}', ['uses' => 'HobbyController@update', 'as' => 'hobbies.update']);
Route::delete('hobbies/{id}', ['uses' => 'HobbyController@destroy', 'as' => 'hobbies.destroy']);
Route::get('hobbies/{id}/delete', ['uses' => 'HobbyController@delete', 'as' =>'hobbies.delete']);

//Alumni admin
Route::get('postslistalumni', 'AdminController@getPostslistalumni')->name('admin.postslistalumni');
Route::get('alumnipartners', 'AdminController@getAlumnipartners');
Route::get('alumniaccount', 'AdminController@getAlumniaccount', ['as' => 'register']);
Route::post('alumniaccount', 'AdminController@adminregister')->name('admin.register');

Route::delete('viewalumni/{user_id}', 'AdminController@deletealumni')->name('viewalumni.destroy');//delete alumni user

Route::get('create', 'AdminController@getCreatePost');
// Route::get('stats', 'AdminController@getStats');
Route::get('alumnitable', 'AdminController@getAlumnitable')->name('admin.alumnitable');

Route::get('partners', 'AdminController@getPartners');
Route::get('postslist', 'AdminController@getPostslist');
Route::resource('alumnipartners', 'PartnerController'); //the table name is alumnipartners
Route::resource('course', 'CourseController');
Route::resource('campus', 'CampController');
Route::get('showalumniposts/{alumpost_id}', 'AdminController@getshowalumniposts');
Route::get('viewalumni/{user_id}', 'AdminController@viewalumni')->name('admin.viewalumni');
Route::get('myaccount/{admin_id}', 'AdminController@getshowaccount')->name('myaccount');
Route::put('updatemyaccount/{admin_id}', 'AdminController@updatemyaccount')->name('updatemyaccount');
Route::get('/adminchangePassword','AdminController@showChangePasswordForm'); //changepassword
Route::post('/adminchangePassword','AdminController@changePassword')->name('adminchangePassword');

Route::get('updateprofileuser/{user_id}' ,'AdminController@getupdateprofileuser');//update your profile
Route::put('updateprofileuser/{user_id}', 'AdminController@updateprofileuser')->name('updateprofileuser.update');


//alumni user
Route::get('chart', 'HomeController@getchart');
Route::get('/home', 'HomeController@index')->name('/home');//landing homepage for alumni
Route::get('show/{post_id}', 'HomeController@getShow')->name('show.adminpost');
Route::get('showalumni/{alumpost_id}', 'HomeController@getShowalumni');
Route::get('showpartner/{partner_id}', 'HomeController@getShowpartner');
Route::get('showalumnipost/{alumpost_id}', 'HomeController@getShowalumnipost');
Route::delete('deletealumnipost/{alumpost_id}', 'HomeController@deletealumnipost');


Route::get('viewcoalumni/{user_id}', 'HomeController@viewcoalumni');

Route::get('viewprofile/{user_id}', 'HomeController@viewProfile')->name('alumni.viewprofile');
Route::post('updatefeaturedimage/{user_id}' ,'HomeController@updatefeaturedimage');//for profile picture
Route::get('updateprofile/{user_id}' ,'HomeController@getupdateprofile');//update your profile
Route::put('updateprofile/{user_id}', 'HomeController@updateprofile')->name('updateprofile.update');

Route::get('/changePassword','HomeController@showChangePasswordForm'); //changepassword
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::get('contact', 'HomeController@getContact');


Route::get('aboutus', 'HomeController@getAbout');
Route::resource('alumniposts', 'AlumpostController', ['except' => ['store', 'destroy']]); //table for alumnipost
Route::put('approved/{id}', ['uses' => 'AdminController@getApproved', 'as' => 'alumniposts.approved']);
Route::delete('alumniposts/{id}', ['uses' => 'AdminController@destroy', 'as' => 'alumniposts.destroy']);
Route::post('alumniposts/{user_id}',['uses' => 'AlumpostController@store', 'as' => 'alumniposts.store'] );



//superadmin
Route::get('addadmin', 'SuperadminController@getAddadmin');
Route::get('showsuperadmin/{admin_id}', 'SuperadminController@showadmin');
Route::delete('showsuperadmin/{admin_id}', 'SuperadminController@deleteadmin')->name('deleteadmin');


Route::get('/', function () {
	$posts = Post::orderBy('created_at', 'desc')->paginate(5);
	$partners = Partner::orderBy('created_at', 'desc')->paginate(10);

	// $users = User::find($id);

	// Notification::send($users, new InvoicePaid());
    return view('welcome', array('posts' => $posts, 'partners' => $partners,));
});//for localhost:8000

Route::get('markRead', 'HomeController@markAsRead')->name('markRead'); //notifications

Route::post('contactus', function(Request $request) {

	$this->validate($request, [
		'email' => 'required|email',
		'subject' => 'min:3',
		'message' => 'min:3']);

	$data = array(
		'email' => $request->email,
		'subject' => $request->subject,
		'bodyMessage' => $request->message,
	);

	Mail::send('email.contact', $data, function($message) use ($data){
		$message->from($data['email']);
		$message->to('aakristel1@gmail.com');
		$message->subject($data['subject']);
	});

	$posts = Post::orderBy('created_at', 'desc')->paginate(10);
	$partners = Partner::orderBy('created_at', 'desc')->paginate(10);
	return view('welcome', array('posts' => $posts, 'partners' => $partners));
});


Route::get('admin','PostController@store');
Route::resource('posts', 'PostController');//for PostController== posting data

Auth::routes();//
// Route::post('addadmin' ,'SuperadminController@addadmin')->name('admin.add');
Route::get('/admin', 'AdminController@index');//landing homepage for admin


//user logout
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/register' ,'SuperadminController@addadmin')->name('admin.add');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('superadmin')->group(function(){

	Route::get('/login', 'Auth\SuperadminLoginController@showLoginForm')->name('superadmin.login');
	Route::post('/login', 'Auth\SuperadminLoginController@login')->name('superadmin.login.submit');
	
	Route::get('/', 'SuperadminController@index')->name('superadmin.dashboard');
	Route::post('/addadmin', 'Auth\SuperadminLoginController@register')->name('admin.register.submit');
	Route::get('/logout', 'Auth\SuperadminLoginController@logout')->name('superadmin.logout');

});





