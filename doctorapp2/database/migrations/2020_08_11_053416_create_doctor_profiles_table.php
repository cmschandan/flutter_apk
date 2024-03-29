<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('about', 240);
            $table->string('experience', 220);
            $table->string('education', 220);
            $table->string('fb_profile')->nullable();
            $table->string('twitter_profile')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('upload_profile');
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
        Schema::dropIfExists('doctor_profiles');
    }
}
