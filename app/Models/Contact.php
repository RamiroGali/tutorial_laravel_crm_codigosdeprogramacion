<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'name',
        'email',
        'phone',
        'company',
        'position',
        'notes',
        'active'
    ];
    
    public function client(){
        return $this->belongsTo(Client::class);
    }
    
    public function contacts(){
        return $this->belongsTo(Contact::class);
    }
}
