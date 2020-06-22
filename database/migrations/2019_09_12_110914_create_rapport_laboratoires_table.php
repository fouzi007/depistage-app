<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapportLaboratoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_laboratoires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->float('psa_totale')->nullable();
            $table->float('psa_libre')->nullable();
            $table->text('observations')->nullable();
            $table->boolean('surv_reguliere')->default(false);
            $table->boolean('adresser_urologue')->default(false);
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	        $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('rapport_laboratoires');
    }
}
