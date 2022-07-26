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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->comment('Ссылка на таблицу с ролями');

            $table->index('role_id', 'user_role_id_idx');
            $table->foreign('role_id', 'user_role_id_fk')->references('id')->on('roles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('user_role_id_idx');
            $table->dropForeign('user_role_id_fk');
            $table->dropColumn('role_id');
        });
    }
};
