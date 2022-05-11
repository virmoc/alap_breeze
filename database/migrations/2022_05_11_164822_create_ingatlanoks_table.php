<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingatlanoks', function (Blueprint $table) {
            $table->increments("id");
            $table->Integer('kategoria')->unsigned();
            $table->index('kategoria');
            $table->foreign('kategoria')->references('id')->on('kategoriaks');
            $table->char("leiras");
            $table->date("hirdetesDatuma");
            $table->boolean("tehermentes")->default(true);
            $table->Integer("ar");
            $table->char("kepUrl");
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
        Schema::dropIfExists('ingatlanoks');
    }
};
