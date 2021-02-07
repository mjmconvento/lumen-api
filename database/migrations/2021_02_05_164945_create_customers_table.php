<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->char('first_name', 50);
            $table->char('last_name', 50);
            $table->char('email', 70);
            $table->char('username', 30);
            $table->char('password', 128);
            $table->char('gender', 10);
            $table->char('phone', 30);
            $table->char('country', 20);
            $table->char('city', 35);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
