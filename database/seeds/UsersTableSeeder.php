<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//    	Création des roles

	    $role = new \App\Role();
	    $role->name = 'admin';
	    $role->description = 'Administrateur Système';
	    $role->save();

	    $role3 = new \App\Role();
	    $role3->name = 'lab';
	    $role3->description = 'Agent de laboratoire';
	    $role3->save();

	    $role2 = new \App\Role();
	    $role2->name = 'medecin';
	    $role2->description = 'Médecin';
	    $role2->save();

//	    Création des utilisateurs

        $user = new \App\User();

        $user->name = 'Fawzi Noual';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('fnoual123');
        $user->email_verified_at = now();
        $user->save();


	    $user->roles()->attach($role);

        $labo = new \App\User();

	    $labo->name = 'Agent de laboratoire';
	    $labo->email = 'labo@gmail.com';
	    $labo->affiliation = 'Laboratoire X';
	    $labo->password = bcrypt('fnoual123');
	    $labo->email_verified_at = now();
	    $labo->save();

	    $labo->roles()->attach($role3);

        $medecin = new \App\User();

	    $medecin->name = 'Médecin';
	    $medecin->email = 'medecin@gmail.com';
	    $medecin->affiliation = 'Hôpital Mustapha Bacha';
	    $medecin->password = bcrypt('fnoual123');
	    $medecin->email_verified_at = now();
	    $medecin->save();

	    $medecin->roles()->attach($role2);
    }
}
