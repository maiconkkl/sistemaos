<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    public function empresas(){
        return $this->belongsToMany('App\Empresas');
    }
    protected $guarded = ['id'];
    protected $fillable = ['empresas_id', 'documento', 'tipo'];
}
