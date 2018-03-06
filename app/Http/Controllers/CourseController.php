<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Alumpost;
use Auth;

class CourseController extends Controller
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
        $courses = Course::all();
        $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('course.index', array('courses' => $courses, 'alumposts' => $alumposts, 'admin' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100);
        return view('course.create', array('alumposts' => $alumposts, 'admin' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, array('name' => 'required|max:255'));

        $course = new Course;

        $course->name = $request->name;
        $course->save();

        return redirect()->route('course.index', $course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $courses = Course::find($id);
          $alumposts = Alumpost::where('approved', '0')->orderBy('created_at', 'desc')->paginate(100); 
        return view('course.show', array('courses' => $courses, 'alumposts' => $alumposts, 'admin' => Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        $course->delete();

        return redirect()->route('course.index', $course->id);
    }
}
