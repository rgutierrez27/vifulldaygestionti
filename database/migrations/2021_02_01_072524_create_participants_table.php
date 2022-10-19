<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('participants', function (Blueprint $table) {
        //     $table->increments('id_participant');
        //     $table->string('name')->nullable(false);
        //     $table->string('email')->nullable(false);
        //     $table->string('phone')->nullable(false);
        //     $table->string('organization')->nullable(false);
        //     $table->boolean('confirmed')->default(0);
        //     $table->string('confirmation_code')->nullable();
        //     $table->integer('IS_DELETE')->nullable(false)->default(0);
        //     $table->boolean('IS_CERTIFICATE')->default(0);
        //     $table->timestamps();
        // });
        Schema::create('aca_congreso_participantes', function (Blueprint $table) {
            $table->increments('id_participante');
            $table->string('persona', 8)->nullable(false);
            $table->string('nombre_evento')->nullable(false);
            $table->string('codigo_evento')->nullable(false);
            $table->string('organization')->nullable(false);
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->integer('is_delete')->nullable(false)->default(0);
            $table->boolean('is_certificado')->default(0);
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
        Schema::dropIfExists('participants');
    }
}
