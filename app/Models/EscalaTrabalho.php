<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EscalaTrabalho extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'escala_trabalho';

    protected $fillable= [
        'name'
    ];

}
