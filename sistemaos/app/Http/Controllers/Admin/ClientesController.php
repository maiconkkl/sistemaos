<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enderecos;
use App\Emails;
use App\User;
use App\Clientes;
use App\Empresas;
use App\Telefones;
use App\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = User::find(Auth::id());
        $empresa = $user->empresa_id != null ? $user->empresa()->first() : null;
        if (Gate::allows('list_cliente')) {
            $empresas = Empresas::where('tipo', 2)->get();
            return view('admin.clientes.index')->with('empresas', $empresas);
        }elseif ($empresa != null and $empresa->tipo == 1 and Gate::allows('list_cliente_proprios')){
            $empresas_clientes = Clientes::get_clientes($empresa);
            return view('admin.clientes.index')->with('empresas', $empresas_clientes);
        }
        return redirect()->route('home');
    }

    public function create()
    {
        if (Gate::allows('create_cliente') || Gate::allows('create_cliente_proprio')) {
            $data = array(
                'revendas'=> Empresas::where('tipo', 1)->get(),
                'user'=> User::find(Auth::id()),
            );
            return view('admin.clientes.create')->with('data', $data);
        }
        return redirect()->route('home');
    }
    public function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }
    public function store(Request $request)
    {
        if(Gate::allows('create_cliente') || Gate::allows('create_cliente_proprio')) {

            if (count($request->phone_type) != count($request->phone) ||
                count($request->phone_type) != count($request->phone_contact))
                return redirect()->route('home');

            if (count($request->email_type) != count($request->email) ||
                count($request->email_type) != count($request->contato_email))
                return redirect()->route('home');

            if (count($request->documento_type) != count($request->documento))
                return redirect()->route('home');

            if (count($request->logradouro) != count($request->bairro) ||
                count($request->logradouro) != count($request->cidade) ||
                count($request->logradouro) != count($request->estado) ||
                count($request->logradouro) != count($request->endereco_type))
                return redirect()->route('home');

            $user = User::find(Auth::id());
            if(!Gate::allows('create_cliente') && $user->empresas_id == null)
                return redirect()->route('home');

            $empresa = new Empresas;
            $empresa->plano_id = null;
            $empresa->razao = $request->razao_social;
            $empresa->fantasia = $request->nome_fantasia;
            $empresa->tipo = '2';
            $empresa->save();

            if(Gate::allows('create_cliente')) {
                $cliente = new Clientes;
                $cliente->revenda_id = $request->revenda_id;
                $cliente->empresas_id = $empresa->id;
                $cliente->save();
            }elseif (Gate::allows('create_cliente_proprio') && $user->empresas_id != null){
                $cliente = new Clientes;
                $cliente->revenda_id = $user->empresas_id;
                $cliente->empresas_id = $empresa->id;
                $cliente->save();
            }

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
        }
        return redirect()->route('admin.clientes.index');
    }
}
