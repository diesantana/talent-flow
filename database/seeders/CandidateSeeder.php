<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->generateFakePdf(); // Cria um currículo fake para os testes
        Candidate::factory()->count(15)->create();
    }

    /**
     * Cria um currículo fake para os testes usando a biblioteca DomPDF.
     */
    private function generateFakePdf(): void
    {
        $path = 'resume/curriculo_fake.pdf';

        if (!Storage::exists($path)) {
            $pdf = Pdf::loadView('pdf.curriculo_fake');
            Storage::put($path, $pdf->output());
        }
    }
}
