<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Hobby;
use Image;
use Storage;
class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $this->validate($request, array(
            'body' => 'required|max:2000',
            'featuredimage' => 'sometimes|image'
        ));

        $user = User::find($user_id);

        $hobby = new Hobby();
        $hobby->body = $request->body;

        //save our image
        if ($request->hasFile('featuredimage')) {
            $image = $request->file('featuredimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $hobby->image = $filename;
        }

        $hobby->user()->associate($user);
        $hobby->save();


         return redirect()->route('alumni.viewprofile', $hobby->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hobby = Hobby::find($id);

        return view('alumni.hobbyedit', array('hobby' => $hobby, 'user' => Auth::user(),));
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
       $hobby = Hobby::find($id);
        $this->validate($request, array(
            'body' => 'required',
        ));

       
        $hobby->body = $request->body;

         if ($request->hasFile('featuredimage')) {

             $image = $request->file('featuredimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $hobby->image;

            //update the database
            $hobby->image = $filename;

            //delete the old one

            Storage::delete($oldFilename);

         }
         $hobby->save();


        return redirect()->route('alumni.viewprofile', $hobby->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $hobby = Hobby::find($id);
        return view('alumni.hobbydelete', array('user' => Auth::user(), 'hobby' => $hobby ));
    }
    public function destroy($id)
    {
        $hobby = Hobby::find($id);
         Storage::delete($hobby->image);//delete the photo
        $hobby->delete();

        return redirect()->route('alumni.viewprofile', $hobby->id);
    }
}
