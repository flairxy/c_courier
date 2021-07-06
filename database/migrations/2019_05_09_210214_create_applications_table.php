<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('othername')->nullable();
            $table->string('phone')->nullable();
            $table->string('passport')->nullable();
            $table->string('certificate')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('lga')->nullable();
            $table->string('state')->nullable();
            $table->string('ffirstname')->nullable();
            $table->string('flastname')->nullable();
            $table->string('flga')->nullable();
            $table->string('fphone')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
