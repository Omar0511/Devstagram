<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Aquí agregamos el nuevo campo que no esta en la tabla original
            $table->string('username')->unique();
            // UNIQUE: significa que no se puede repetir el valor de este campo en la tabla, esto ayuda a SLUG, cuando convierte a URL valida que no sean repetidos
            // Cada vez que realizamos cambios en la migración, debemos ejecutar el comando: php artisan migrate:rollback --step=1
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Se tiene que poner aqui también
            $table->dropColumn('username');
        });
    }
};
