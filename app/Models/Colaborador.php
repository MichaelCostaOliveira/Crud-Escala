<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colaborador extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'colaboradores';

    protected $fillable= [
        'escala_trabalho_id',
        'name',
        'matricula',
        'cpf'
    ];

    public function escalaTrabalho()
    {
        return $this->hasOne(EscalaTrabalho::class, 'id', 'escala_trabalho_id');
    }
}
