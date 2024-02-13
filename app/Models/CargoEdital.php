<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoEdital extends Model
{
    use HasFactory;


    protected $fillable = [
        'cargo_id',
        'edital_id'
    ];
}
