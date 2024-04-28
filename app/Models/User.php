<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'whatsapp',
        'is_admin',
        'asaas_client',
        'direto',
        'clique'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    public function filiados()
    {
        return $this->hasMany(User::class,'direto','id');
    }
    public function patrocinador()
    {
        return $this->belongsTo(User::class,'direto','id');
    }

    public function extratos()
    {
        return $this->hasMany(Extrato::class);
    }

    public function SaldoDisponivel()
    {
        $disponivel = $this->extratos()->where('tipo',0)->sum('valor')-$this->extratos()->where('tipo',1)->sum('valor');

        return $disponivel;
    }
}
