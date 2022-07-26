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
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->comment("Ссылка на Post");
            $table->unsignedBigInteger('tag_id')->comment("Ссылка на Tag");

            $table->index('post_id', 'post_tag_post_id_idx');
            $table->index('tag_id', 'post_tag_tag_id_idx');

            $table->foreign('post_id', 'post_tag_post_id_fk')->references('id')->on('posts');
            $table->foreign('tag_id', 'post_tag_tag_id_fk')->references('id')->on('tags');


            $table->comment("Таблица (pivot) для связи  таблиц Post и Tag");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_tags', function (Blueprint $table)
        {
            $table->dropIndex('post_tag_post_id_idx');
            $table->dropIndex('post_tag_tag_id_idx');
            $table->dropForeign('post_tag_post_id_fk');
            $table->dropForeign('post_tag_tag_id_fk');
        });
        Schema::dropIfExists('post_tags');
    }
};
