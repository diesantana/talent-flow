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
            $table->dropColumn('email_verified_at'); // Remove a coluna email_verified_at

            $table->enum('role', ['rh', 'gestor'])->default('gestor')->after('password');;

            $table->foreignId('department_id')
                ->nullable() // Pode ser null
                ->constrained('departments')
                ->nullOnDelete(); // Ao deletar um departamento, essa coluna recebe o valor null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable();
            $table->dropColumn('role');
            $table->dropForeign(['department_id']); // Remove a chave estrangeira antes de deletar a coluna
            $table->dropColumn('department_id');
        });
    }
};
