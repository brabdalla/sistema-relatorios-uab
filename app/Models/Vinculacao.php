<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vinculacao extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'vinculo';

    protected $fillable = [
        'user_id',
        'funcao_uab_id',
        'curso_id',
        'edital',
        'data_inicio',
        'data_fim',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function funcao()
    {
        return $this->belongsTo(Funcao::class, 'funcao_uab_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function relatorio() 
    {
        return $this->hasMany(Coordenador::class, 'user_coordenador_id');
    }

   


}
