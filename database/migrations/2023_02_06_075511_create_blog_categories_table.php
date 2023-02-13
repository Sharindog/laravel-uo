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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id', false)->default(1);

            // slug - для ссылки транслитом, должна быть уникальна
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description')->nullable();

            $table->timestamps();
            // если удалить - то не пропадёт совсем и можно восстановить
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
        Schema::dropIfExists('blog_categories');
    }
};
