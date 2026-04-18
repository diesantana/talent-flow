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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->index();
            $table->string('phone', 20)->nullable();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete(); // O candidato será removido ao deletar o departamento
            $table->string('linkedin_url')->nullable();
            $table->text('summary')->nullable();
            $table->string('resume_path'); // currículo
            $table->enum('status', ['new', 'under_review', 'interview', 'archived'])->default('new');
            $table->timestamp('lgpd_consent_at')->nullable(); // Data de aceitação do LGPD
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
