<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SoftwareModulos;

class SoftwareModulosController extends Controller
{
    public function index(){
        $modulos = SoftwareModulos::all();
        return view('admin.modulos.index')->with('modulos', $modulos);
    }
}
