<?php

namespace App\Http\Controllers;

use App\TR;
use Illuminate\Http\Request;

class TRController extends Controller
{
	/**
	 * @param $patient
	 * @param $field
	 * @param $action
	 */
	public function update($patient,$field,$action) {
	    $action === 'activate' ? $act = true :  $act = false;
		TR::where('patient_id',$patient)->update([
			$field => $act
		]);
    }
}
