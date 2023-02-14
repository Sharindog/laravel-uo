<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->references('id')->on('blog_categories')->cascadeOnDelete()->cascadeOnUpdate();

            // slug - для ссылки транслитом, должна быть уникальна
            $table->string('slug')->unique();
            $table->string('title');

            // маленькая выдержка из статьи
            $table->text('excerpt')->nullable();

//            $table->text('content_raw');
            $table->text('content_html');

            $table->timestamp('published_at')->index()->nullable();

            $table->timestamps();
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
        Schema::dropIfExists('blog_posts');
    }
};
