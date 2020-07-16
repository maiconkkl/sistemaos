<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['revenda_id', 'empresas_id'];

    public function revenda(){
        return $this->hasOne('App\Empresas', 'id', 'revenda_id');
    }

    public function empresa(){
        return $this->hasOne('App\Empresas', 'id', 'empresas_id');
    }

    public function get_clientes($revenda){
        $clientes = $this::where('revenda_id', $revenda->id)->get();
        $id_clientes = array();
        foreach($clientes as $cliente)
            array_push($id_clientes, $cliente->empresas_id);
        return $empresas = Empresas::whereIn('id', $id_clientes)->get();
    }
}
