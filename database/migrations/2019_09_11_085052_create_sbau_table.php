<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSbauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbau', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->boolean('dysurie')->default(false);
            $table->boolean('hematurie')->default(false);
            $table->boolean('pollakiurie')->default(false);
            $table->boolean('hemospermie')->default(false);
            $table->boolean('aucun')->default(true);
            $table->boolean('ts')->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('sbau');
    }
}
