<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblClient', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('tblInchiriere', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('tblLocatie', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('tblMasina', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('tblPlata', function (Blueprint $table) {
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
        //
    }
}
