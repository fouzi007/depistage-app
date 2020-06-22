<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SBAU extends Model
{
    protected $table = 'sbau';

    protected $guarded = [];

    public function patient () {
    	return $this->hasOne(Patient::class,'id','patient_id');
    }
}
