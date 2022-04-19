<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familles', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->text("description")->nullable();
            $table->text("taille_max")->nullable();
            $table->text("coloration")->nullable();
            $table->text("distribution_naturelle")->nullable();
            $table->text("introduction_bg")->nullable();
            $table->string("illustration")->nullable();
            $table->text("remarque")->nullable();
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
        Schema::dropIfExists('familles');
    }
}
