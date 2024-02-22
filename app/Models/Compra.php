<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'edital_id',
        'cargo_id',
        'user_id',
        'asaas_id',
        'status',
        'data_pagamento',
        'contador',
        'valor'
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function edital()
    {
        return $this->belongsTo(Edital::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusFormatedAttribute()
    {
        switch ($this->attributes['status']) {
            case 0:
                return 'Pendente de Pagamento';
            case 1:
                return 'Pagamento Confirmado';
            default:
                return 'Status Desconhecido';
        }
    }
}
