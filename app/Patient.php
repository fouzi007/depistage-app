<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = ['region'];

    public $dates = ['date_naissance'];

    public $appends = ['age'];

    public function user() {
    	return $this->hasOne(User::class,'id','user_id');
    }

    public function sbau () {
    	return $this->hasOne(SBAU::class,'patient_id','id');
    }

    public function wilaya() {
    	return $this->hasOne(Wilaya::class,'id','wilaya_id');
    }

    public function tr() {
    	return $this->hasOne(TR::class,'patient_id','id');
    }

    public function rapport() {
    	return $this->hasOne(RapportLaboratoire::class,'patient_id','id');
    }

    public function getNomCompletAttribute(){
    	return $this->nom . ' ' . $this->prenom;
    }

    public function getAgeAttribute() {
    	return $this->date_naissance->age;
    }
    public function getAgeInfoAttribute() {
    	return $this->date_naissance->format('d-m-Y') . ' ( ' . $this->date_naissance->age . ' ans )';
    }

    public function getNumeroAttribute(){

	    $numero = str_replace('-','',substr($this->tel,9));

	    return '+213' . $numero;
    }

    public function setSBAU() {
    	$this->sbau()->create([
    		'aucun' => true
	    ]);
    }
    public function setTR() {
    	$this->tr()->create([
    		'normal' => true,
		    'user_id' => $this->user_id
	    ]);
    }
    public function setRapport() {
    	$this->rapport()->create([
		    'user_id' => $this->user_id
	    ]);
    }
}
