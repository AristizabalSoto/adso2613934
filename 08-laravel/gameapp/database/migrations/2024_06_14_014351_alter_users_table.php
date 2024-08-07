<?php

// ubicación: gameapp/database/migrations/alter_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Verifica si la columna 'name' existe antes de renombrarla
            if (Schema::hasColumn('users', 'name')) {
                $table->renameColumn('name', 'fullname');
            }

            // Verifica si la columna 'gender' no existe antes de agregarla
            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender')->nullable()->after('fullname');
            }

            // Verifica si la columna 'role' no existe antes de agregarla
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('Customer')->after('password');
            }
        });
    }

    /**
     * Reversa las migraciones.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revertir el nombre de la columna 'fullname' a 'name'
            if (Schema::hasColumn('users', 'fullname')) {
                $table->renameColumn('fullname', 'name');
            }

            // Elimina las columnas 'gender' y 'role' si existen
            if (Schema::hasColumn('users', 'gender')) {
                $table->dropColumn('gender');
            }
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
