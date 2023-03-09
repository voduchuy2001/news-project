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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('featured_image');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->longText('content');
            $table->string('slug');
            $table->enum('status', ['published', 'no_published'])->default('no_published');
            $table->enum('featured_post', ['yes', 'no'])->default('no');
            $table->integer('count_view')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
