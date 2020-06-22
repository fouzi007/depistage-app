<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('pr')->default(false);
            $table->boolean('pd')->default(false);
            $table->boolean('np')->default(false);
            $table->boolean('normal')->default(true);
            $table->timestamps();

        });

	    Schema::table('trs', function($table) {
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		    $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trs');
    }
}
