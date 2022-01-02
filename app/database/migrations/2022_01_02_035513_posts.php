<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // blog table
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title')->unique();
            $table->longText('body');

            $table->string('image')->default('');
            $table->boolean('open')->default(1);
            $table->boolean('is_real_project')->default(1);
            $table->string('real_date')->default('');

            $table->string('slug')->unique();
            $table->boolean('active');
            $table->timestamps();

            $table->string('keywords')->default('');
            $table->text('meta_desc')->nullable();

            $table->foreignId('category_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop blog table
        Schema::drop('posts');
    }
}
