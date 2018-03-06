<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;
use App\Alumpost;
use Auth;
class CampController extends Controller
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
       
       $camps = Camp::orderBy('id', 'desc')->paginate(5);
       $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100); 
        return view('admin.campus.index', array('alumposts' => $alumposts, 'camps' => $camps, 'admin' => Auth::user() ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100); 
        
         return view('admin.campus.create', array('alumposts' => $alumposts, 'admin' => Auth::user(),));
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

        ));
        //store the database
        $camps = new Camp;
        $camps->title = $request->title;

        $camps->save();

        return redirect()->route('campus.index', $camps->id);

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
         $camp = Camp::find($id);
          $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100); 
        return view('admin.campus.show', array('camp' => $camp, 'alumposts' => $alumposts, 'admin' => Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camp = Camp::find($id);
         $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100); 
        return view('admin.campus.edit', array('camp' => $camp, 'alumposts' => $alumposts, 'admin' => Auth::user()));
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
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        //save the data
         $camps = Camp::find($id);

         $camps->title = $request->input('title');


         $camps->save();

         return redirect()->route('campus.index', $camps->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camp = Camp::find($id);

        $camp->delete();

        return redirect()->route('campus.index', $camp->id);
    }
}
