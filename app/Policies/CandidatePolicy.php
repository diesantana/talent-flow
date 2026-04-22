<?php

namespace App\Policies;

use App\Models\Candidate;
use App\Models\User;


class CandidatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // qualquer usuário logado pode acessar a página de listagem
    }

    /**
     * Determina se um usuário pode visualizar um candidato.
     * @param User $user Usuário autenticado.
     * @param Candidate $candidate Candidato a ser visualizado.
     * Basicamente, este método evita que um gestor visualize um candidato de outro departamento.
     */
    public function view(User $user, Candidate $candidate): bool
    {
        // RH tem acesso total a qualquer candidato | Gestor tem acesso aos candidatos de seu departamento
        return $user->role === 'rh'
            || $user->department_id === $candidate->department_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determina se um usuário pode atualizar um candidato
     * @param User $user Usuário autenticado
     * @param Candidate $candidate Candidato a ser atualizado
     * Basicamente, este método evita que um gestor atualize um candidato de outro departamento.
     */
    public function update(User $user, Candidate $candidate): bool
    {
        // RH pode atualizar qualquer candidato
        // Gestor pode atualizar os candidatos de seu departamento
        return $user->role === 'rh'
            || $user->department_id === $candidate->department_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Candidate $candidate): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Candidate $candidate): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Candidate $candidate): bool
    {
        return false;
    }
}
