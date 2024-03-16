<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'user_id',
        'valor',
        'descricao',
        'status',
        'data_pagamento'
    ];


    public function disponivel()
    {

    }

    public function getTipoFormatadoAttribute()
    {
        return $this->tipo == 0 ? 'Entrada' : 'Saída';
    }

    public function getStatusFormatadoAttribute()
    {
        return $this->status == 0 ? 'Pendente' : 'Paga';
    }

    public function getDataPagamentoFormatadoAttribute()
    {
        $data_pagamento = Carbon::parse($this->data_pagamento)->format('d/m/Y');
        return $data_pagamento;
    }


}
