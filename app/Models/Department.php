<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Department extends Model
{
    /**
     * Um departamento possui vários usuários
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Um departamento possui vários candidatos
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
