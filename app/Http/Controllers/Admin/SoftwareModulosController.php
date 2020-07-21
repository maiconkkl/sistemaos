<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Software;
use App\SoftwareModulos;
use Illuminate\Support\Facades\Gate;


class SoftwareModulosController extends Controller
{
    public function index(){
        if (Gate::allows('list_software_modulo')) {
            $modulos = SoftwareModulos::all();
            return view('admin.modulos.index', array('modulos' => $modulos));
        }
        return redirect()->route('home');
    }

    public function create(){
        if (Gate::allows('create_software_modulo')) {
            $softwares = Software::all();
            return view('admin.modulos.create', array('softwares' => $softwares));
        }
        return redirect()->route('home');
    }

    public function store(Request $request){
        if (Gate::allows('create_software_modulo')) {
            $modulo = new SoftwareModulos;
            $modulo->nome = $request->nome;
            $modulo->software_id = $request->software_id;
            $modulo->save();
            return redirect()->route('admin.modulos.index');
        }
        return redirect()->route('home');
    }
}
