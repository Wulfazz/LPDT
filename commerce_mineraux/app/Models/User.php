<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id'; // Assurez-vous que c'est le bon nom de clé primaire utilisé dans votre base de données
    public $timestamps = false;        // Si vous n'utilisez pas les timestamps, confirmez que cela est bien configuré

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
