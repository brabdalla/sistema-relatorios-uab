<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{
    use HasFactory;

    protected $table = 'coordenador';

    protected $fillable = [
        'user_coordenador_id',
        'curso_coordenador_id',
        'data_inicio',
        'data_fim'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_coordenador_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_coordenador_id');
    }

    public function relatorio() 
    {
        return $this->hasMany(Coordenador::class, 'user_coordenador_id');
    }



}
