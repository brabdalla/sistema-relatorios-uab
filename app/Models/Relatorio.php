<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relatorio extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'relatorio';

    protected $fillable = [
        'vinculo_id',
        'user_coordenador_id',
        'descrição_atividades',
        'mes_ano_referencia',
        'created_at',
        'updated_at',
        'data_validacao_bolsista',
        'data_validacao_coordenador',
        'hash_validacao_coordenador',
        'hash_validacao_bolsista'
    ];

    public function vinculo()
    {
        return $this->belongsTo(Vinculacao::class, 'vinculo_id');
    }

    public function coordenador()
    {
        return $this->belongsTo(User::class, 'user_coordenador_id');
    }

}
