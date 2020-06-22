<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class SbauController extends Controller
{
    public function update (Patient $patient,$field,$action) {

    	if($field == 'aucun'){
		    $patient->sbau->update([
			    'dysurie' => false,
				'hematurie' => false,
				'pollakiurie' => false,
				'hemospermie' => false,
				'ts' => false,
			    'aucun' => true
		    ]);
	    }
    	else {
		    if ($action == 'activate') {
			    $set = true;
		    }
		    else {
			    $set = false;
		    }
		    $patient->sbau->update([
			    $field => $set ,
			    'aucun' => false
		    ]);
	    }

    	return response()->json([
    		'info' => ucfirst($field)
	    ]);
    }
}
