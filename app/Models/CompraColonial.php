<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraColonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'cesta_id',
        'user_id',
        'asaas_id',
        'status',
        'data_pagamento',
        'valor'
    ];

    public function cesta()
    {
        return $this->belongsTo(Cesta::class);
    }

}
