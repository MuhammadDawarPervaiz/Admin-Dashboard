<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ColorColumnStatusesTable extends Migration
{
    public function up()
    {
        Schema::table('statuses', function (Blueprint $table) {
            $table->string('color');
        });
    }

    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
