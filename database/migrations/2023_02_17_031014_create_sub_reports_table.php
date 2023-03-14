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
        Schema::create('sub_reports', function (Blueprint $table) {
            $table->id('subreport_id');
            $table->string('usr_create')->nullable();
            $table->timestamps();
            $table->string('usr_update')->nullable();
            $table->string('subreport_name')->nullable();
            $table->string('subreport_link')->nullable();
            $table->string('keyword')->nullable();
            $table->integer('report_id')->nullable();
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
        Schema::dropIfExists('sub_reports');
    }
};
