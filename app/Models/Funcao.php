<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    protected $table = 'funcao';

    protected $fillable = [
        'nome_funcao'
    ];

    public function vinculacao()
    {
        return $this->hasMany(Vinculacao::class, 'funcao_uab_id');
    }

}
