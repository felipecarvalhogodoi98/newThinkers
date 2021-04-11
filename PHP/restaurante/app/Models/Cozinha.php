<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cozinha extends Model 
{
    protected $table = "cozinha";

    protected $fillable =[
        "nome",
        "abertura",
        "fechamento"
    ];

    protected $casts = [
        'date' => 'timestamp',
    ];

    public $timestamps = false;
}
