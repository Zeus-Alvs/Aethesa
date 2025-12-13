<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Importando os outros models para fazer a ligação
use App\Models\Cart;
use App\Models\Favorite;

class User extends Authenticatable
{

    use HasFactory, Notifiable;
    
    protected $guarded = []; // Libera geral
    
    // (Mantenha o hidden e o casts, eles são importantes para a senha)
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['password' => 'hashed'];

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
}