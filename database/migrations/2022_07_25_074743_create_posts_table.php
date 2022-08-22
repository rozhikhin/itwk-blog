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
            $table->string('name')->comment('Заголовок поста');
            $table->text('content')->comment('Содержимое поста');
            $table->string('image')->comment( 'Ссылка на изображение');
            $table->unsignedBigInteger('category_id')->comment('Ссылка на таблицу категорий');
            $table->unsignedBigInteger('author_id')->nullable()->comment('Ссылка на таблицу с пользователями');
            $table->unsignedBigInteger('likes')->nullable()->comment('Счетчик лайков (Нравится)');
            $table->boolean('is_published')->default(0)->comment('Опубликован пост или нет');
            $table->timestamps();
            $table->softDeletes();

            $table->index('category_id', 'post_category_id_idx');
            $table->index('author_id', 'post_author_id_idx');

            $table->foreign('category_id', 'post_category_id_fk')->references('id')->on('categories');
            $table->foreign('author_id', 'post_author_id_fk')->references('id')->on('users');

            $table->comment("Таблица постов (записей, статей");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table)
        {
            $table->dropIndex('post_category_id_idx');
            $table->dropIndex('post_author_id_idx');
            $table->dropForeign('post_category_id_fk');
            $table->dropForeign('post_author_id_fk');
        });
        Schema::dropIfExists('posts');
    }
};
