<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo_image')->unique();
            $table->string('banner_image')->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('company_details');
    }
}
