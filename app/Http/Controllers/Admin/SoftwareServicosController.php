<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SoftwareModulos;
use App\SoftwareServicos;
use Illuminate\Support\Facades\Gate;

class SoftwareServicosController extends Controller
{
    public function index(){
        if (Gate::allows('list_software_servico')) {
            return view('admin.servicos.index', array('servicos' => SoftwareServicos::all()));
        }
        return redirect()->route('home');
    }

    public function create(){
        if (Gate::allows('create_software_servico')) {
            return view('admin.servicos.create', array('modulos' => SoftwareModulos::all()));
        }
        return redirect()->route('home');
    }

    public function store(Request $request){
        if (Gate::allows('create_software_servico')) {
            $modulo = SoftwareModulos::where('id', $request->modulo_id)->first();
            $servico = new SoftwareServicos;
            $servico->nome = $request->nome;
            $servico->modulo_id = $request->modulo_id;
            $servico->software_id = $modulo->software->id;
            $servico->save();
            return redirect()->route('admin.servicos.index');
        }
        return redirect()->route('home');
    }
}
