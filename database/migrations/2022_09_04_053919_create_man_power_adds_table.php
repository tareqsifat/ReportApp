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
        Schema::create('man_power_adds', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',100)->nullable();
            $table->string('name',100)->nullable();
            $table->string('man_power_role_id',100)->nullable();
            $table->string('process',100)->nullable();
            $table->string('edu_inst_category',100)->nullable();
            $table->string('edu_inst_sub_category',100)->nullable();;
            $table->string('class',100)->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('man_power_adds');
    }
};
