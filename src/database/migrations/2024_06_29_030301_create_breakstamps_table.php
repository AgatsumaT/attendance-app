<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakstampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakstamps', function (Blueprint $table) {
            $table->id();
            $table->dateTime('breakIn');
            $table->dateTime('breakOut')->nullable();
            $table->timestamps();

            $table->foreignId('timestamp_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('breakstamps', function (Blueprint $table) {
            $table->dropForeign(['timestamp_id']);
        });

        Schema::dropIfExists('breakstamps');
    }
}
