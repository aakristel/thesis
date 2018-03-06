<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use Image;
use App\Alumpost;
use Storage;
use Auth;
use Notification;
use App\Notifications\Partnersnotif;
use App\Notifications\Updatepartner;
use App\User;

class PartnerController extends Controller
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
         $partners = Partner::orderBy('id', 'desc')->paginate(10);
         $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('alumnipartners.index', array('partners' => $partners, 'alumposts' => $alumposts, 'admin' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('alumnipartners.create', array('alumposts' => $alumposts, 'admin' => Auth::user()));
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
            'title' => 'required|max:255',
           // 'category_id' => 'required|integer',
            'description' => 'required',
            'contact' => 'nullable',
            'email' => 'nullable|max:255|string',
            'location' => 'nullable',
            'branches' => 'nullable',
            'featuredimage' => 'sometimes|image'

        ));
        //store the database
        $partners = new Partner;
        
        $partners->title = $request->title;
        $partners->description = $request->description;
        $partners->contact = $request->contact;
        $partners->email = $request->email;
        $partners->location = $request->location;
        $partners->branches = $request->branches;
        //save our image
        if ($request->hasFile('featuredimage')) {
            $image = $request->file('featuredimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $partners->image = $filename;
        }

        $partners->save();

        Notification::send(User::all(), new Partnersnotif($partners));

        return redirect()->route('alumnipartners.index');

        //redirect to the other page
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $partners = Partner::find($id);
        $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
         return view('alumnipartners.show', array('alumposts' => $alumposts, 'partners' => $partners, 'admin' => Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $partner = Partner::find($id);
          $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
         return view('alumnipartners.edit', array('partner' => $partner, 'alumposts' => $alumposts, 'admin' => Auth::user()));
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
           // 'category_id' => 'required|integer',
            'description' => 'nullable',
            'contact' => 'nullable',
            'email' => 'nullable|email|max:255',
            'location' => 'nullable',
            'branches' => 'nullable',
            'featuredimage' => 'image'
        ));
        //save the data
         $partners = Partner::find($id);

         $partners->title = $request->input('title');
         $partners->description = $request->input('description');
         $partners->contact = $request->input('contact');
         $partners->email = $request->input('email');
         $partners->location = $request->input('location');
         $partners->branches = $request->input('branches');



         if ($request->hasFile('featuredimage')) {

             $image = $request->file('featuredimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $partners->image;

            //update the database
            $partners->image = $filename;

            //delete the old one

            Storage::delete($oldFilename);

         }

         $partners->save();
         Notification::send(User::all(), new Updatepartner($partners));
         return redirect()->route('alumnipartners.show', $partners->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partners = Partner::find($id);

        $partners->delete();

        return redirect()->route('alumnipartners.index');
    }
}
