<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumpost;
use App\Post;
use App\Partner;
use App\User;
use Image;
use Storage;
use Auth;


class AlumpostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(2);
        $partners = Partner::orderBy('created_at', 'desc')->paginate(2);
        $alumposts = Alumpost::where('approved', '1')->orderBy('created_at', 'desc')->limit(100)->get();
        return view('/home', array('posts' => $posts, 'partners' =>$partners, 'alumposts' => $alumposts, 'user' => Auth::user(), 'post' => $post));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(1);
        $partners = Partner::orderBy('created_at', 'desc')->limit(100)->get();
        $users = User::all();
        return view('alumniposts.create', array('posts' => $posts, 'partners' => $partners, 'users' => $users ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
         //validate the data
        $this->validate($request, array(
            'title' => 'required|max:10000',
            'subject' => 'string|max:10000',
            'author' => 'required|string|max:255',
            'approved' => 'max:255',
            'featuredimage' => 'sometimes|image'

        ));
        //store in the database
        $user = User::find($user_id);

        $alumposts = new Alumpost();
        
        $alumposts->title = $request->title;
        $alumposts->subject = $request->subject;
        $alumposts->author = $request->author;
        $alumposts->approved = false;
     


        //save our image
        if ($request->hasFile('featuredimage')) {
            $image = $request->file('featuredimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $alumposts->image = $filename;
        }

         $alumposts->user()->associate($user);
        $alumposts->save();


         //redirect with flash
        flash('Pls wait for the Confirmation of the Admin to your Post')->success();

        return redirect()->route('alumniposts.index');

        //redirect to the other page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
         $alumnipost = Alumpost::find($id);
           //save the data
        // $alumnipostsa = Alumpost::find($id);
        //  $alumnipostsa->approved = true;
         // $alumnipostsa->save();
          
        

           $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);

         return view('alumniposts.show', array('alumnipost' => $alumnipost, 'alumposts' => $alumposts, ));
         // return view('alumniposts.show')->withAlumnipost($alumnipost);
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnipost = Alumpost::find($id);
        return view('alumniposts.edit')->withAlumnipost($alumnipost);
    }

     

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validate data
         $this->validate($request, array(
            'title' => 'required|max:255',
            'subject' => 'required',
            'featuredimage' => 'image'
        ));
         
        //save the data
         $alumnipost = Alumpost::find($id);

         $alumnipost->title = $request->input('title');
         $alumnipost->subject = $request->input('subject');



         if ($request->hasFile('featuredimage')) {

             $image = $request->file('featuredimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $alumnipost->image;

            //update the database
            $alumnipost->image = $filename;

            //delete the old one

            Storage::delete($oldFilename);

         }

         $alumnipost->save();
       
         return redirect()->route('alumniposts.show', $alumnipost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumpost = Alumpost::find($id);
        Storage::delete($alumpost->image);//delete the photo
        $alumpost->delete();

        // return redirect()->route('admin.postslistalumni');

       $alumposts = Alumpost::orderBy('id', 'desc')->paginate(10);
        $alumpostsas = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('admin.postslistalumni', array('alumposts' => $alumposts, 'alumpostsas' => $alumpostsas));
    }
}
