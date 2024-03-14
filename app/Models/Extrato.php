<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'user_id',
        'valor',
        'descricao'
    ];


    public function disponivel()
    {

    }
    public function getTipoFormatadoAttribute()
    {
        return $this->tipo == 0 ? 'Entrada' : 'Saída';
    }
}
