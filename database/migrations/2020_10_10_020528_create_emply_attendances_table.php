<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmplyAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emply_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('att_date');
            $table->string('att_year');
            $table->string('att_month');
            $table->string('attendance');
            $table->string('edit_date')->nullable();
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
        Schema::dropIfExists('emply_attendances');
    }
}
