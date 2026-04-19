<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Candidate>
 */
class CandidateFactory extends Factory
{

    // Define o model associado ao factory
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Gera nome e sobrenome sem os prefixos Dr, Sr, etc.
        $firstName = fake()->firstName();
        $lastName  = fake()->lastName();

        return [
            'name' => $firstName . ' ' . $lastName, // nomes mais precisos
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->optional(0.7)->phoneNumber(), // 70% de chance de ter telefone
            'department_id' => Department::inRandomOrder()->first()->id ?? Department::factory(), // Atribui um departamento aleatório
            'linkedin_url' => fake()->optional(0.5)->url(),
            'summary' => fake()->optional(0.8)->sentence(),
            'resume_path' => 'private/resume/curriculo_fake.pdf', // Caminho para o currículo fake
            'status' => fake()->randomElement(['new', 'under_review', 'interview', 'archived']),
            'lgpd_consent_at' => now(),
        ];
    }
}
