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
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('usr_create')->nullable();
            $table->timestamps();
            $table->string('usr_update')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_desc')->nullable();
            $table->string('item_link')->nullable();
            $table->string('start_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('item_vendor')->nullable();
            $table->string('item_PIC')->nullable();
            $table->string('item_PIC_email')->nullable();
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
        Schema::dropIfExists('items');
    }
};
