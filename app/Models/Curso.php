<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Curso extends Model
{
    use HasFactory;
    #use HasRoles;

    protected $table = 'curso';

    protected $fillable = [
        'id',
        'nome_curso',
        'oferta',
        'inicio_curso',
        'fim_curso'
    ];


    public function vinculacao()
    {
        return $this->hasMany(Vinculacao::class, 'curso_id');
    }

    public function disciplina()
    {
        return $this->hasMany(Disciplina::class, 'curso_id');
    }

    public function coordenador()
    {
        return $this->hasMany(Coordenador::class, 'curso_coordenador_id');
    }

}
