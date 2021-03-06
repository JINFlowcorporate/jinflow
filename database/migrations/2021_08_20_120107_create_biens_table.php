<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('map');
            $table->string('slug')->unique();
            $table->integer('nb_beds');
            $table->integer('type_id');
            $table->double('nb_bathroom', 8, 2);
            $table->integer('zipcode');
            $table->boolean('status')->default(1);
            $table->string('state');
            $table->string('city');
            $table->string('square_feet');
            $table->dateTime('rent_start_date');
            $table->double('price', 8, 2);
            $table->integer('total_tokens');
            $table->double('tokens_price', 8, 2);
            $table->integer('expected_yield');
            $table->integer('gross_rent_year');
            $table->integer('gross_rent_month');
            $table->integer('property_management');
            $table->integer('jinflow_tax');
            $table->integer('property_tax');
            $table->integer('insurance');
            $table->string('utilities')->default('Tenant-paid');
            $table->integer('net_rent_year');
            $table->integer('net_rent_month');
            $table->integer('yield_token');
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
        Schema::dropIfExists('biens');
    }
}
