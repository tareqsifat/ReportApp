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
            $table->string('পুর্বের সংখ্যা', 100)->nullable();
            $table->string('বর্তমান সংখ্যা', 100)->nullable();
            $table->string('বৃদ্ধি সংখ্যা', 100)->nullable(); 
            $table->string('বৃদ্ধি মানোন্নয়ন সংখ্যা', 100)->nullable(); 
            $table->string('বৃদ্ধি আগমন সংখ্যা', 100)->nullable(); 
            $table->string('বৃদ্ধি সংখ্যা', 100)->nullable(); 
            $table->string('বৃদ্ধি সংখ্যা', 100)->nullable(); 
            $table->string('বৃদ্ধি সংখ্যা', 100)->nullable(); 
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
