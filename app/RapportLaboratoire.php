<?php

namespace App;

use App\Events\RapportUpdated;
use Illuminate\Database\Eloquent\Model;

class RapportLaboratoire extends Model
{
	protected $guarded = [];

	protected $dispatchesEvents = [
		'updated' => RapportUpdated::class
	];

	public function patient() {
		return $this->hasOne(Patient::class,'id','patient_id');
	}
	public function getRatioAttribute(){
		if ($this->psa_totale !== null){
		$ratio = $this->psa_libre / $this->psa_totale * 100;
		return round($ratio,'2');
		}
		return null;
	}
}
