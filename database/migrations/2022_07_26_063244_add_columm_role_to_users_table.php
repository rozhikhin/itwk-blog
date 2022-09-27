<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->unsignedBigInteger('role_id')->default(2)->comment('Ссылка на таблицу с ролями');

            $table->index('role_id', 'user_role_id_idx');
            $table->foreign('role_id', 'user_role_id_fk')->references('id')->on('roles');

        });
        \App\Models\User::factory()->create([
            'name' => 'Администратор',
            'email' => 'admin@localhost.local',
            'password' => Hash::make('admin'),
            'role_id' => '1',
        ]);
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
