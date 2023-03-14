<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('company_id');
            $table->string('usr_create')->nullable();
            $table->timestamps();
            $table->string('usr_update')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_tel_no')->nullable();
            $table->string('is_active',10)->nullable();
        });
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};