<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class ProyectoMigrate extends Migration{

    public function up()
    {

        Schema::create('logs', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('lavel');
            $table->text('message');
            $table->timestamps();
        });


        Schema::create('terms', function (Blueprint $table){
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('name_terms');
            $table->text('description_terms');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('careers', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->string('name_careers');
            $table->string('code_careers');
            $table->text('description_careers');
            $table->timestamps();
        });

        Schema::create('mps', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')->references('id')->on('careers');
            $table->string('name_mps');
            $table->string('code_mps');
            $table->text('description_mps');
            $table->timestamps();
        });

        Schema::create('ufs', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('mp_id');
            $table->foreign('mp_id')->references('id')->on('mps');
            $table->string('name_uf');
            $table->string('code_uf');
            $table->text('description_uf');
            $table->timestamps();
        });

        Schema::create('enrolments', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')->references('id')->on('careers');
            $table->string('dni', 60);
            $table->string('state');
            $table->timestamps();
        });
    
        Schema::create('records', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('uf_id');
            $table->foreign('uf_id')->references('id')->on('ufs');

            $table->timestamps();
        });
   
        Schema::create('profilereq', function (Blueprint $table){
            $table->id();
            $table->string('name_profile');
            $table->timestamps();
        });

        Schema::create('requirements', function (Blueprint $table){
            $table->id();
            $table->string('name_req');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profilereq');
            $table->timestamps();
        });
 
        Schema::create('reqenrol', function (Blueprint $table){
            $table->id();

            $table->unsignedBigInteger('req_id');
            $table->foreign('req_id')->references('id')->on('requirements');

            $table->unsignedBigInteger('enrolments_id');
            $table->foreign('enrolments_id')->references('id')->on('enrolments');

            $table->string('state');
            $table->timestamps();
        });
 
        Schema::create('enrolmentufs', function (Blueprint $table){
            $table->id();
             $table->unsignedBigInteger('enrolments_id');
            $table->foreign('enrolments_id')->references('id')->on('enrolments');

            $table->timestamps();
        });

        Schema::create('uploads', function (Blueprint $table){
            $table->id();
            $table->binary('data');
             $table->unsignedBigInteger('reqenrol_id');
            $table->foreign('reqenrol_id')->references('id')->on('reqenrol');
            $table->timestamps();
        });
    }

    public function down(){

        Schema::dropIfExists('terms');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('mps');
        Schema::dropIfExists('ufs');
        Schema::dropIfExists('enrolments');
        Schema::dropIfExists('records');
        Schema::dropIfExists('profilereq');
        Schema::dropIfExists('requirements');
        Schema::dropIfExists('reqenrol');
        Schema::dropIfExists('enrolmentufs');
        Schema::dropIfExists('uploads');
    }
}