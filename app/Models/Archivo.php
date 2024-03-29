<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash',
        'nombre',
        'extension',
        'mime',
        'producto_id',
    ];
}
