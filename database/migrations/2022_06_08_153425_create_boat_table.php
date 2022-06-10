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
        Schema::create('boat', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("make");
            $table->string("model");
            $table->integer("year");
            $table->integer("length");
            $table->integer("width");
            $table->string("hin")->unique();
            $table->decimal("total_hours", 2);
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
        Schema::dropIfExists('boat');
    }
};
