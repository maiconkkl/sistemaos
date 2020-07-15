<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Emails;
use App\Enderecos;
use App\Planos;
use App\Empresas;
use App\Telefones;
use App\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RevendasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }

    public function index()
    {
        if (Gate::allows('list_revenda')) {
            $empresas = Empresas::where('tipo', 1)->get();
            return view('admin.revendas.index')->with('empresas', $empresas);
        }
        return redirect()->route('home');
    }

    public function create()
    {
        if (Gate::allows('create_revenda')) {
            $planos = Planos::all();
            return view('admin.revendas.create')->with('planos', $planos);
        }
        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        if (Gate::allows('create_revenda')) {
            if (count($request->phone_type) != count($request->phone) ||
                count($request->phone_type) != count($request->phone_contact))
                return false;

            if (count($request->documento_type) != count($request->documento))
                return false;

            if (count($request->logradouro) != count($request->bairro) ||
                count($request->logradouro) != count($request->cidade) ||
                count($request->logradouro) != count($request->estado) ||
                count($request->logradouro) != count($request->endereco_type))
                return false;

            $empresa = new Empresas;
            $empresa->plano_id = $request->plano_id;
            $empresa->razao = $request->razao_social;
            $empresa->fantasia = $request->nome_fantasia;
            $empresa->tipo = '1';
            $empresa->save();

            for ($x = 0; $x < count($request->phone_type); $x++) {
                $telefone = new Telefones;
                $telefone->empresas_id = $empresa->id;
                $telefone->phone_type = $request->phone_type[$x];
                $telefone->contact = $request->phone_contact[$x];
                $telefone->phone = $this->soNumero($request->phone[$x]);
                $telefone->save();
            }
            for ($x = 0; $x < count($request->documento); $x++) {
                $documentos = new Documentos;
                $documentos->empresas_id = $empresa->id;
                $documentos->tipo = $request->documento_type[$x];
                $documentos->documento = $this->soNumero($request->documento[$x]);
                $documentos->save();
            }
            for ($x = 0; $x < count($request->endereco_type); $x++) {
                $enderecos = new Enderecos;
                $enderecos->empresas_id = $empresa->id;
                $enderecos->logradouro = $request->logradouro[$x];
                $enderecos->bairro = $request->bairro[$x];
                $enderecos->numero = $request->numero[$x];
                $enderecos->complemento = $request->complemento[$x];
                $enderecos->cidade = $request->cidade[$x];
                $enderecos->estado = $request->estado[$x];
                $enderecos->tipo = $request->endereco_type[$x];
                $enderecos->save();
            }
            for ($x = 0; $x < count($request->email_type); $x++) {
                $email = new Emails;
                $email->empresas_id = $empresa->id;
                $email->email_type = $request->email_type[$x];
                $email->email = $request->email[$x];
                $email->contact = $request->contato_email[$x];
                $email->save();
            }
            return redirect()->route('admin.revendas.index');
        }
        return redirect()->route('home');
    }
}
