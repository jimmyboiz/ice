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
        Schema::create('audit_feedback', function (Blueprint $table) {
            $table->id('audit_feedback_id');
            $table->string('usr_create')->nullable();
            $table->timestamps();
            $table->string('usr_update')->nullable();
            $table->string('audit_feedback_answer')->nullable();
            $table->string('audit_feedback_remark')->nullable();
            $table->string('audit_feedback_attach')->nullable();
            $table->integer('audit_question_id')->nullable();
            $table->string('is_active', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_feedback');
    }
};
