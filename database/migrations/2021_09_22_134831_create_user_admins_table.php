<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->timestamps();
            $table->foreignId('archived_by')->nullable();
            $table->boolean('archived')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_admins');
    }
}
