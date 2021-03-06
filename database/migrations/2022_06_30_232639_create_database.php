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
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url_portrait');
            $table->enum('state', ['broadcast', 'finished']);
            $table->string('published_at')->nullable();
            $table->string('periodicity');
            $table->text('synopsis');
            $table->timestamps();
        });

        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('enum_gender');
            $table->timestamps();
        });

        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('role');
            $table->timestamps();
        });

        Schema::create('tomes', function (Blueprint $table) {
            $table->id();
            $table->integer('number_tome');
            $table->date('published_at');
            $table->integer('number_pages');
            $table->double('price', 10, 2);
            $table->timestamps();

            $table->foreignId('manga_id')->constrained('mangas');
        });

        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreignId('car_id')->constrained('cars');
            $table->foreignId('tome_id')->constrained('tomes');
        });

        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->double('subtotal', 10, 2);
            $table->double('total', 10, 2);
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
        });

        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('tome_id');
            $table->timestamps();

            $table->foreignId('bill_id')->constrained('bills');
        });

        Schema::create('author_manga', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained('authors');
            $table->foreignId('manga_id')->constrained('mangas');
        });

        Schema::create('gender_manga', function (Blueprint $table) {
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('manga_id')->constrained('mangas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
