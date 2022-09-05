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
        Schema::create('man_powers', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 100)->nullable(); 
            $table->string('man_power_role_id', 100)->nullable();
            $table->string('পুর্বের_সংখ্যা', 100)->nullable();
            $table->string('বর্তমান_সংখ্যা', 100)->nullable();
            $table->string('বৃদ্ধি_সংখ্যা', 100)->nullable(); 
            $table->string('ঘাটতি_সংখ্যা', 100)->nullable();
            $table->string('বাস্তবায়ন_হার', 100)->nullable();
            $table->string('টার্গেট', 100)->nullable();
            $table->string('মুলতবি', 100)->nullable();
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
        Schema::dropIfExists('man_powers');
    }
};
