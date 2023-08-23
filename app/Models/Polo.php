<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polo extends Model
{
    use HasFactory;
    protected $table = 'polo';

    protected $fillable = [
        'nome_polo'
    ];

    public function vinculacao()
    {
        return $this->hasMany(Vinculacao::class, 'polo_id');
    }
}
