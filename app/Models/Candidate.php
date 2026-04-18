<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'phone', 'department_id', 'linkedin_url', 'summary', 'resume_path', 'status'])]
class Candidate extends Model
{
    /**
     * Um candidato pertence a um departamento
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
