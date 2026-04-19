<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // usuário do RH (departamento nulo)
        User::create([
            'name' => 'Usuário do RH',
            'email' => 'rh@empresa.com',
            'password' => Hash::make('senha123'),
            'role' => 'rh',
            'department_id' => null,
        ]);

        // Busca os departamentos criadas
        $departments = Department::all();

        // Cria 1 usário por departamento
        foreach ($departments as $department) {

            if ($department->name == 'Tecnologia da Informação') {
                // Usuário de TI (para o nome e email não ficar muito grande)
                User::create([
                    'name' => 'Gestor TI',
                    'email' => 'ti@empresa.com',
                    'password' => Hash::make('senha123'),
                    'role' => 'gestor',
                    'department_id' => $department->id,
                ]);
            } else{
                // Outros usários
                User::create([
                    'name' => 'Gestor ' . $department->name,
                    'email' => strtolower($department->name) . '@empresa.com',
                    'password' => Hash::make('senha123'),
                    'role' => 'gestor',
                    'department_id' => $department->id,
                ]);
            }

        }
    }
}
