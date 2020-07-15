<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    public function empresas(){
        return $this->belongsToMany('App\Empresas');
    }
    protected $guarded = ['id'];
    protected $fillable = [
        'empresas_id',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'estado',
        'tipo',
    ];
}
