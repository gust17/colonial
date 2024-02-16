<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comprasAtivas = auth()->user()->compras->where('status', 1);
        $editals = \App\Models\Edital::with(['cargos' => function ($query) {
            $query->orderBy('name');

            //dd($compraAtivas);
        }])->where('ativo', 1)->get();
        return view('index', compact('editals', 'comprasAtivas'));
    }
}
