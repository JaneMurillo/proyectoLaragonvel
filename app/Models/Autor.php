<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Autor extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $table = 'autors';

    public function productos(){
        return $this->belongsToMany(Producto::class)->withPivot(['date']);
    }

    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value), // Accesor
            set: fn (string $value) => ucfirst($value), // Mutator
        );
    }
}
