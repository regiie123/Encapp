<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumText('encString')->nullable();
            $table->mediumText('decString')->nullable();
            $table->string('passWord');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encs');
    }
}
