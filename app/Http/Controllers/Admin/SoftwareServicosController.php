<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SoftwareServicos;

class SoftwareServicosController extends Controller
{
    public function index(){
        $servicos = SoftwareServicos::all();
        return view('admin.servicos.index')->with('servicos', $servicos);
    }
}
