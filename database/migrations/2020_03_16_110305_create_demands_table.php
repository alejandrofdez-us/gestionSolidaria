<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description');
            $table->enum('demandType',['pasearMascota','trasladoMedico','compraSupermercado','sacarBasura','compraFarmacia','otros']);
            $table->date('accepted')->nullable();
            $table->date('satisfied')->nullable();
            $table->date('cancelled')->nullable();
            $table->date('validity')->nullable();

            $table->unsignedBigInteger('petitioner_id');
            $table->unsignedBigInteger('volunteer_id');


            $table->foreign('petitioner_id')->references('id')->on('users');
            $table->foreign('volunteer_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }
}
