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
        Schema::create('man_power_removes', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->string('name')->nullable();
            $table->string('man_power_role_id')->nullable();
            $table->string('process')->nullable();
            $table->string('edu_inst_category')->nullable();
            $table->string('edu_inst_sub_category')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('class')->nullable();
            $table->string('creator')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('man_power_removes');
    }
};
