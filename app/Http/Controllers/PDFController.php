<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;

class PDFController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function pdfcourse(){

    	$user = User::orderBy('course', 'asc')->get();
    	$pdf = PDF::loadView('pdf.pdfcourse', ['user' => $user ]);
    	return $pdf->download('alumnipercourse.pdf');
    }

    public function pdfcampus(){
    	$user = User::orderBy('campus', 'asc')->get();
    	$pdf = PDF::loadView('pdf.pdfcampus', ['user' => $user]);
    	return $pdf->download('alumnipercampus.pdf');
    }

    public function pdfyeargrad(){
    	$user = User::orderBy('yeargrad', 'asc')->get();
    	$pdf = PDF::loadView('pdf.pdfyeargrad', ['user' => $user]);
    	return $pdf->download('alumniyeargraduated.pdf');
    }
    public function pdfemploymentall(){

    	$user = User::orderBy('employment', 'asc')->get();
    	$pdf = PDF::loadView('pdf.pdfemploymentall', ['user' => $user, 'chart' => $chart]);
    	return $pdf->download('alumniemploymentstatus.pdf');



    }
    public function pdfempemployed(){
    	$user = User::where('employment', 'employed')->orderBy('employment', 'asc')->get();
    	$pdf = PDF::loadView('pdf.pdfempemployed', ['user' => $user]);
    	return $pdf->download('alumniemploymentemployed.pdf');
    }

    public function pdfunderemployed(){
    	$user = User::where('employment', 'Underemployed')->orderBy('employment', 'asc')->get();
    	$pdf = PDF::loadView('pdf.pdfunderemployed', ['user' => $user]);
    	return $pdf->download('alumniunderemployed.pdf');
    }
    public function pdfunemployed(){
    	$user = User::where('employment', 'Unemployed')->orderBy('employment', 'asc')->get();
    	$pdf = PDF::loadView('pdf.pdfunemployed', ['user' => $user]);
    	return $pdf->download('alumniunemployed.pdf');
    }
}
