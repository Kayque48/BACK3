<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'produto_id', 'quantidade', 'status'];

    // app/Models/Pedidos.php

    public function cliente() {
        return $this->belongsTo(\App\Models\Clientes::class);
    }

    public function produto() {
        return $this->belongsTo(\App\Models\Produto::class); // ajusta o nome do model se necessário
    }
}
