<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    public function empresas(){
        return $this->belongsToMany('App\Empresas');
    }
}
