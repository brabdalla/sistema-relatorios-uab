<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'disciplina';

    protected $fillable = [
        'curso_id',
        'nome_disciplina',
        'ch',
        'semestre_modulo'
    ];
    protected $dates = ['deleted_at'];




    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }


}
