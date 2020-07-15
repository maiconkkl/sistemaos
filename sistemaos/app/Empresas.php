<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    public function documentos(){
        return $this->belongsToMany('App\Documentos');
    }

    public function enderecos(){
        return $this->belongsToMany('App\Enderecos');
    }

    public function telefones(){
        return $this->belongsToMany('App\Telefones');
    }
    public function get_record_cliente(){
        return $this->hasOne('App\Clientes', 'empresas_id', 'id');
    }
    public function plano(){
        return $this->hasOne('App\Planos', 'id', 'plano_id');
    }
    protected $guarded = ['id'];
    protected $fillable = ['plano_id', 'razao', 'fantasia', 'tipo'];
}
