<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedInteger('user_id');
	        $table->string('nom');
	        $table->string('prenom');
	        $table->date('date_naissance')->nullable();
	        $table->string('sit_fam')->default('Célibataire');
	        $table->string('tel');
	        $table->string('email')->nullable();
	        $table->unsignedInteger('wilaya_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
