<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estoques extends Model
{
    use HasFactory;
    protected $fillable = ['produto', 'quantidade', 'preco', 'descricao', 'localizacao'];
    
}
