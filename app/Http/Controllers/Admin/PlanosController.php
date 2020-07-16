<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Planos;
use Illuminate\Http\Request;

class PlanosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Gate::allows('list_plano')) {
            $planos = Planos::all();
            return view('admin.planos.index')->with('planos', $planos);
        }
        return redirect()->route('home');
    }
    public function create()
    {
        if (Gate::allows('create_plano')) {
            return view('admin.planos.create');
        }
        return redirect()->route('home');
    }
    public function store(Request $request)
    {
        if (Gate::allows('create_plano')) {
            $plano = new Planos;
            $plano->nome = $request->nome;
            $plano->autorizacao = $request->autorizacao;
            $plano->atende = $request->atende == 0 ? false : true;
            $plano->percentual_atendimento = $request->percentual_atendimento;
            $plano->taxa_fixa = $request->taxa_fixa;
            $plano->save();
            return redirect()->route('admin.planos.index');
        }
        return redirect()->route('home');
    }
}
