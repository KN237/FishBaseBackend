<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especes', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->text("description")->nullable();
            $table->string("illustration")->nullable();
            $table->text("remarque")->nullable();
            $table->unsignedBigInteger("famille_id")->constrained();
            $table->unsignedBigInteger("category_id")->constrained();
            $table->unsignedBigInteger("forme_id")->constrained();
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
        Schema::dropIfExists('especes');
    }
}
