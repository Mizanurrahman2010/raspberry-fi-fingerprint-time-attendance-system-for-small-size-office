<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 100);
            $table->char('designation', 100);
            $table->date('joining_date');
            $table->string('current_status');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('current_ddress');
            $table->string('permanent_address');
            $table->unsignedTinyInteger('status');
            $table->date('created_at');
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
        Schema::dropIfExists('staffs');
    }
}
