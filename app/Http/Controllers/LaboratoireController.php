<?php

namespace App\Http\Controllers;

use App\Patient;
use App\RapportLaboratoire;
use Illuminate\Http\Request;

class LaboratoireController extends Controller
{
    public function index() {
    	$patients = Patient::orderBy('updated_at','desc')->get();
    	return view('laboratoire',compact('patients'));
    }

    public function getForm(Patient $patient){
    	$html = view('laboratoire-modal',[
    		'rapport' => $patient->rapport
	    ]);

    	return response()->json([
    		'html' => $html->render()
	    ]);

    }
    public function update(RapportLaboratoire $rapport,Request $request) {
    	$rapport->update($request->all());
    	return back()->with('message','Rapport soumis avec succès');
    }
}
