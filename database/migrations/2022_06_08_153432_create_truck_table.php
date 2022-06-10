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
        Schema::create('truck', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("make");
            $table->string("model");
            $table->integer("year");
            $table->integer("seats");
            $table->decimal("bed_length",2);
            $table->string("color");
            $table->string("vin")->unique();
            $table->integer("current_mileage");
            $table->integer("service_interval");
            $table->date("next_service");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truck');
    }
};
