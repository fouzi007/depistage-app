<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
	    'nom' => $faker->firstName ,
		'prenom' => $faker->lastName ,
		'date_naissance' => $faker->date('Y-m-d','now') ,
		'sit_fam' => $faker->randomElement(['Marié','Célibataire']) ,
		'tel' => $faker->phoneNumber ,
		'email' => $faker->email ,
		'wilaya_id' => $faker->numberBetween(0,48) ,
    ];
});
