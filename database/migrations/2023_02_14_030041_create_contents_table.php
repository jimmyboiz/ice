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
        Schema::create('contents', function (Blueprint $table) {
            $table->id('content_id');
            $table->string('usr_create')->nullable();
            $table->timestamps();
            $table->string('usr_update')->nullable();
            $table->string('content_name')->nullable();
            $table->string('content_link')->nullable();
            $table->string('content_category')->nullable();
            $table->string('content_path')->nullable();
            $table->integer('report_id')->nullable();
            $table->integer('drawing_id')->nullable();
            $table->integer('cert_id')->nullable();
            $table->integer('agreement_id')->nullable();
            $table->integer('event_id')->nullable();
            $table->integer('carryProject_id')->nullable();
            $table->integer('software_id')->nullable();
            $table->integer('environment_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->string('keyword')->nullable();
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
        Schema::dropIfExists('contents');
    }
};
