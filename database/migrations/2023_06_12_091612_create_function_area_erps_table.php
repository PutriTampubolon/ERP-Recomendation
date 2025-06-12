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
        Schema::create('function_area_erps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('erp_id');
            $table->unsignedBigInteger('function_area_id');
            $table->integer('bobot');
            $table->foreign('erp_id')->on('erps')->references('id');
            $table->foreign('function_area_id')->on('function_areas')->references('id');
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
        Schema::dropIfExists('function_area_erps');
    }
};
