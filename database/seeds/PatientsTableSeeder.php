<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient = \App\Patient::create([
	        'user_id' => 1,
			'nom' => 'Test',
			'prenom' => 'Patient',
			'date_naissance' => now()->subYears(45),
			'sit_fam' => 'Marié',
			'tel' => '+213 (0) 540-781-136',
			'email' => 'fnoual@gmail.com',
			'wilaya_id' => 16,
        ]);

        $patient->setSBAU();
	    $patient->setTR();
	    $patient->setRapport();
    }
}
