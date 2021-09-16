<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_agent')->default(0);
            $table->boolean('is_active')->default(0);
            $table->integer('phone')->nullable();
            $table->string('username')->nullable()->unique();
            $table->dateTime('birthdate')->nullable();
            $table->boolean('us_citizen')->nullable();
            $table->string('referrer_code')->unique();
            $table->string('referred_by')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('state')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
