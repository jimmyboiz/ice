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
        Schema::create('systems', function (Blueprint $table) {
            $table->id('system_id');
            $table->string('usr_create')->nullable();
            $table->timestamps();
            $table->string('usr_update')->nullable();
            $table->string('system_name')->nullable();
            $table->string('system_desc')->nullable();
            $table->string('system_category')->nullable();
            $table->string('system_type')->nullable();
            $table->string('system_hostname')->nullable();
            $table->string('system_ip')->nullable();
            $table->string('system_software')->nullable();
            $table->string('system_url')->nullable();
            $table->string('system_deploy')->nullable();
            $table->string('system_publish')->nullable();
            $table->string('system_vendor')->nullable();
            $table->string('system_owner')->nullable();
            $table->string('system_admin')->nullable();
            $table->string('system_hardware')->nullable();
            $table->string('system_os')->nullable();
            $table->string('system_user')->nullable();
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
        Schema::dropIfExists('systems');
    }
};
