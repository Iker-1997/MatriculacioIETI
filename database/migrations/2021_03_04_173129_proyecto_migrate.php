<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class ProyectoMigrate extends Migration{

    public function up()
    {

        Schema::create('terms', function (Blueprint $table){
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('name_terms');
            $table->text('description_terms');
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('careers', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->string('name_careers');
            $table->string('code_careers');
            $table->text('family');
            $table->integer('career_hours');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('mps', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')->references('id')->on('careers');
            $table->string('name_mps');
            $table->string('code_mps');
            $table->integer('mp_min_duration');
            $table->integer('mp_max_duration');
            $table->date('mp_begin');
            $table->date('mp_end');
            $table->timestamps();
        });

        Schema::create('ufs', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('mp_id');
            $table->foreign('mp_id')->references('id')->on('mps');
            $table->string('name_uf');
            $table->string('code_uf');
            $table->integer('uf_duration');
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

            $table->unsignedBigInteger('ufs_id');
            $table->foreign('ufs_id')->references('id')->on('ufs');

            $table->timestamps();
        });
   
        Schema::create('profilereq', function (Blueprint $table){
            $table->id();
            $table->string('name_profile');
            $table->softDeletes();
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
            $table->unsignedBigInteger('ufs_id');
            $table->foreign('ufs_id')->references('id')->on('ufs');
            $table->timestamps();
        });

        Schema::create('uploads', function (Blueprint $table){
            $table->id();
            $table->binary('data');
             $table->unsignedBigInteger('reqenrol_id');
            $table->foreign('reqenrol_id')->references('id')->on('reqenrol');
            $table->timestamps();
        });

        Schema::create('logs', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('level');
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(){
        
        Schema::dropIfExists('terms');

        Schema::table("careers", function(Blueprint $table){
            $table->dropColumn('term_id');
        });

        Schema::dropIfExists('careers');

        Schema::table("mps", function(Blueprint $table){
            $table->dropColumn('career_id');
        });

        Schema::dropIfExists('mps');

        Schema::table("ufs", function(Blueprint $table){
            $table->dropColumn('mps_id');
        });
        Schema::dropIfExists('ufs');

        Schema::table("enrolments", function(Blueprint $table){
            $table->dropColumn('user_id');
            $table->dropColumn('term_id');
            $table->dropColumn('career_id');
        });
        Schema::dropIfExists('enrolments');

        Schema::table("records", function(Blueprint $table){
            $table->dropColumn('user_id');
            $table->dropColumn('ufs_id');
        });
        Schema::dropIfExists('records');

        Schema::table("requirements", function(Blueprint $table){
            $table->dropColumn('profile_id');
        });
        Schema::dropIfExists('requirements');

        Schema::dropIfExists('profire_req');


        Schema::table("reqenrol", function(Blueprint $table){
            $table->dropColumn('req_id');
            $table->dropColumn('enrolments_id');

        });
        Schema::dropIfExists('reqenrol');
        
        Schema::table("enrolemntufs", function(Blueprint $table){
            $table->dropColumn('enrolments_id');
           

        });
        Schema::dropIfExists('enrolmentufs');

        Schema::table("uploads", function(Blueprint $table){
            $table->dropColumn('reqenrol_id');
           

        });
        Schema::dropIfExists('uploads');
        Schema::dropIfExists('logs');
    }
}