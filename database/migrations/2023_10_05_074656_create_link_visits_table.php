<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkVisitsTable extends Migration
{
    public function up()
    {
        Schema::create('link_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('link_id')->nullable();
            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');

            $table->string('ip');
            $table->string('city');
            $table->string('country');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('timezone');
            $table->string('currency_code');
            $table->string('currency_symbol');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('link_visits');
    }
}
