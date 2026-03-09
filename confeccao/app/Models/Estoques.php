<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estoques extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'quantidade', 'localizacao'];

      public function produto() {
        return $this->belongsTo(\App\Models\Produto::class); // ajusta o nome do model se necessário
    }
    
}
