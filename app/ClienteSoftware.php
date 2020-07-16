<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteSoftware extends Model
{
    public function empresas(){
        return $this->belongsToMany('App\Empresas');
    }
    public function softwares(){
        return $this->belongsToMany('App\Software');
    }
}
