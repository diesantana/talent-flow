<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cria 3 departamentos
        Department::create(['name' => 'Tecnologia da Informação']);
        Department::create(['name' => 'Marketing']);
        Department::create(['name' => 'Financeiro']);
    }
}
