<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employment;
use App\User;
use Auth;
class EmploymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            'name' => 'required|max:255',
            'body' => 'max:255',
            'year' => 'max:255'
        ));

        $user = User::find($user_id);

        $employment = new Employment();
        $employment->name = $request->name;
        $employment->body = $request->body;
        $employment->year = $request->year;
        
        $employment->user()->associate($user);

        $employment->save();


       return redirect()->route('alumni.viewprofile', $employment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $employment = Employment::find($id);

        return view('alumni.employmentedit', array('employment' => $employment, 'user' => Auth::user(),));
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
        $employment = Employment::find($id);
        $this->validate($request, array(
            'name' => 'required|max:2000',
            'body' => 'max:2000',
            'year' => 'max:2000'
        ));

      
        $employment->name = $request->name;
        $employment->body = $request->body;
        $employment->year = $request->year;

        $employment->save();


         return redirect()->route('alumni.viewprofile', $employment->id);
    }

    public function delete($id)
    {
        $employment = Employment::find($id);
        return view('alumni.employmentdelete', array('user' => Auth::user(), 'employment' => $employment ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $employment = Employment::find($id);
        
        $employment->delete();

       return redirect()->route('alumni.viewprofile', $employment->id);
    }
}
