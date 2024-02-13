<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    use HasFactory;

    protected $fillable = [
        'edital_id',
        'cargo_id',
        'materia_id',
        'conteudo'
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function edital()
    {
        return $this->belongsTo(Edital::class);

    }
}
