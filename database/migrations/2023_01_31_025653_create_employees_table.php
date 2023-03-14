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
    // public function up()
    // {
    //     Schema::create('employees', function (Blueprint $table) {
    //         $table->integer('seq_no');
    //         $table->increments('emp_id');
    //         $table->string('usr_create')->nullable();
    //         $table->timestamps();
    //         $table->string('usr_update')->nullable();
    //         $table->datetime('date_joined')->nullable();
    //         $table->string('emp_no')->nullable();
    //         $table->string('emp_name')->nullable();
    //         $table->string('emp_gender')->nullable();
    //         $table->string('ad_id')->nullable();
    //         $table->string('emp_password')->nullable();
    //         $table->integer('title_id')->nullable();
    //         $table->integer('designation_id')->nullable();
    //         $table->integer('company_id')->nullable();
    //         $table->integer('prev_grade_id')->nullable();
    //         $table->integer('new_grade_id')->nullable();
    //         $table->integer('dept_id')->nullable();
    //         $table->integer('dept_unit_id')->nullable();
    //         $table->integer('division_id')->nullable();
    //         $table->integer('location_id')->nullable();
    //         $table->integer('system_id')->nullable();
    //         $table->string('resign_date')->nullable();
    //         $table->string('contract_ended')->nullable();
    //         $table->string('is_active')->nullable();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
