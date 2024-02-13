<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    use HasFactory;

    public function orgao()
    {
        return $this->belongsTo(Orgao::class);
    }

    public function conteudos()
    {
        return $this->hasMany(Conteudo::class);
    }
}
