<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefones extends Model
{
    public function empresas(){
        return $this->belongsToMany('App\Empresas');
    }
    protected $guarded = ['id'];
    protected $fillable = ['empresas_id', 'phone_type', 'contact', 'phone'];
}
