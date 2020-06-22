<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required',
	        'prenom' => 'required',
	        'date_naissance' => 'required|before:today',
	        'email' => 'unique:patients',
	        'tel' => 'required|unique:patients',
	        'wilaya_id' => 'required'
        ];
    }

    public function messages() {
	    return [
		    'tel.unique' => 'Le numéro de télephone existe déjà dans la base de données .',
		    'email.unique'  => 'L\'adresse e-mail existe déjà dans la base de données .',
	    ];
    }
}
