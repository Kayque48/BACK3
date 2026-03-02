<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstoquesController extends Controller
{
    public function index() {
        $estoques = \App\Models\Estoques::all();
        return view('estoques.index', compact('estoques'));
    }
}
