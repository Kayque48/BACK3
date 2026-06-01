<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPeido extends Model
{
    protected $guarded = [];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
