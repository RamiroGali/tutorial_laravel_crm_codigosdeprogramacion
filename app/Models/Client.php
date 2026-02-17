<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // 
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'notes',
        'active',
        'user_id'
    ];
    
    // Función que servirá para generar la relación con el modelo "User"
    public function user(){
        // Definir una relación con el modelo 'User'
        // El cliente puede tener una relación con un solo usuario
        // El usuario puede tener una relación con muchos clientes
        return $this->belongsTo(User::class);
    }
}
