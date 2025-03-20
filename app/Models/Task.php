<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    /**
     * La tabla asociada al modelo
     * @var string
     */
    protected $table = 'tasks';

    /**
     * Los campos que pueden ser asignados masivamente
     * @var array
     */
    protected $fillable = ['title', 'description', 'status', 'author'];

    protected $casts = [
        'status' => 'boolean',
    ];
    
    
}
