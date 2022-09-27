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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название роли');
            $table->string('description')->comment('Описание роли');
            $table->timestamps();
            $table->softDeletes();
            $table->comment('Таблица ролей');
        });

        \App\Models\Role::factory()->create([
            'title' => 'Администратор',
            'description' => 'Администратор системы'
        ]);
        \App\Models\Role::factory()->create([
            'title' => 'Пользователь',
            'description' => 'Пользователь системы'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
