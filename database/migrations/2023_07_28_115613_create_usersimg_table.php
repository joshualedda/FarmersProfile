<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usersimg_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->longText('img'); // Changed 'longblob' to 'longText'
            $table->integer('img_size'); // Changed 'int' to 'integer'
            $table->string('img_name');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersimg_table');
    }
};
