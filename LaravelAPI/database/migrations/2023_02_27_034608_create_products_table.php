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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('detail');
            // create 3 columns for cinema 1, cinema 2, cinema 3. Each column will contain an id of a cinema
            $table->unsignedBigInteger('cinema1');
//            $table->index('cinema1');
//            $table->foreign('cinema1')->references('id')->on('cinemas');
            $table->unsignedBigInteger('cinema2');
//            $table->index('cinema2');
//            $table->foreign('cinema2')->references('id')->on('cinemas');
            $table->unsignedBigInteger('cinema3');
//            $table->index('cinema3');
//            $table->foreign('cinema3')->references('id')->on('cinemas');
            $table->year('release_year');
            $table->integer('duration');
            $table->date('show_time'); // YYYY-MM-DD HH:MM:SS
            $table->integer('price');
            $table->string('image');
            $table->string('timeline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
