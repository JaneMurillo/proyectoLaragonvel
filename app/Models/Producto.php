<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $table = ‘my_table’;
    public $timestamps = false;
    protected $table = 'productos';
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    

    public function autors(){
        return $this->belongsToMany(Autor::class)->withPivot(['date']);
    }
}

