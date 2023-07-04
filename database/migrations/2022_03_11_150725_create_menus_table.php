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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2023_04_08_223426_menus.php
            $table->string('libelle');
            $table->string('description');
            $table->string('prix');

=======
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->decimal('price', 10, 2);
>>>>>>> fd73ea3afe7db899955b38672a56225bd055625d:database/migrations/2022_03_11_150725_create_menus_table.php
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
        Schema::dropIfExists('menus');
    }
};
