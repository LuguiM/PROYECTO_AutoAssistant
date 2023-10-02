<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cultura extends Model
{
    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'imagen1',
    ];
}