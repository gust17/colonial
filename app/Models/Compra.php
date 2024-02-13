<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'edital_id',
        'cargo_id',
        'user_id',
        'asaas_id',
        'status',
        'data_pagamento',
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
}
