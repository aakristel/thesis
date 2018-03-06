<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Alumpost;
use Image;
use Storage;
use App\Notifications\InvoicePaid;
use App\Notifications\Updatepost;
use App\User;
use Auth;
use Notification;


class PostController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
     $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('admin.postslist', array('posts' => $posts, 'alumposts' => $alumposts,'admin' => Auth::user() ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('posts.create', array('alumposts' => $alumposts, 'admin' => Auth::user()));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title' => 'required|max:2000',
           // 'category_id' => 'required|integer',
            'body' => 'string|max:10000|nullable',
          
        ));
        //store the database
        $post = new Post;
        
        $post->title = $request->title;
        $post->body = $request->body;
        // $post->image = $request->featuredimage;


        //save our image
                        if ($request->hasFile('featuredimage')) {

                     
                    
                                

                            $image = $request->file('featuredimage');
                            $filename = time() . '.' . $image->getClientOriginalExtension();
                            $location = public_path('images/' . $filename);
                            Image::make($image)->resize(800, 400)->save($location);

                            $post->image = $filename;
                            
                     

                        }
       

    //     if ($request->hasFile('featuredimage')) {
           

    //         foreach ($request->featuredimage as $featuredimage){
                
    //              $filename = time() . '.' .$featuredimage->getClientOriginalName();

    //              $featuredimage->storeAs('public/images/', $filename);

    //         // $image[] = $request->file('featuredimage');
    //         // $filename = time() . '.' . $image->getClientOriginalExtension();
    //         // $location = public_path('images/' . $filename);

    //         // Image::make($image)->resize(800, 400)->save($location);

    //           $post->image =$post->image. ',' .$filename;
             
    //         }
           
    // }

        $post->save();
        flash('Successfuly Saved and Posted in Alumni site')->success();

        // $posta = Post::find($post->id);

        Notification::send(User::all(), new InvoicePaid($post));


        return redirect()->route('posts.index');//redirect to the index

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('posts.show' , array('post' => $post, 'alumposts' => $alumposts, 'admin' => Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('posts.edit', array('post' => $post , 'alumposts' => $alumposts, 'admin' => Auth::user()));
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
            'body' => 'required',
            'featuredimage' => 'image'
        ));
        //save the data
         $post = Post::find($id);

         $post->title = $request->input('title');
         $post->body = $request->input('body');

         if ($request->hasFile('featuredimage')) {

             $image = $request->file('featuredimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $post->image;

            //update the database
            $post->image = $filename;

            //delete the old one

            Storage::delete($oldFilename);

         }


         $post->save();
         Notification::send(User::all(), new Updatepost($post));
         return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->image);//delete the photo
        $post->delete();

        
         // $notification = Auth::user()->notifications()->find($id);
         //   $notification->delete();

        return redirect()->route('posts.index');
    }
}
