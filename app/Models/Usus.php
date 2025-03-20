<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //

    /**
     * La tabla asociada al modelo
     */
    protected $table = 'users';

    /**
     * Los campos que pueden ser asignados masivamente
     */
    protected $fillable = ['name', 'email', 'password'];
}
