<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
use App\Patient;
use App\Services\SMS;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

	protected $smsApi;

	public function __construct(SMS $smsApi) {
		$this->smsApi = $smsApi;
	}


	public function create() {
    	return view('patients.create');
    }

    public function store (PatientCreateRequest $request) {
    	$attributes = $request->all();
		$attributes['user_id'] = auth()->id();
    	$patient = Patient::create($attributes);

    	$patient->setSBAU();
    	$patient->setTR();
    	$patient->setRapport();

    	return redirect(route('patients.show',[
    		'patient' => $patient,
		    'form' => true
	    ]))->with('message','Patient créé');
    }

    public function show(Patient $patient,Request $request){
    	$showform = false;
    	if($request->has('form')){
    		$showform = true;
	    }

    	return view('patients.show',compact('patient','showform'));
    }

    public function delete (Patient $patient) {
    	$patient->delete();
    	return back();
    }

    public function sendSmsVerification() {
		$this->smsApi->client()->messages->create('+213555443126',[
			'from' => '+12058720347',
			'body' => 'ça s\'est bien passé'
		]);
    }

}
