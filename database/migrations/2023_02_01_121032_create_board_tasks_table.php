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
        Schema::create('board_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Column_id')->references('id')->on('board_columns');
            $table->string('Titel');
            $table->unsignedInteger('Priority');
            $table->string('Type');
            $table->string('ColorTask');
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
        Schema::dropIfExists('board_tasks');
    }
};
