<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwareServicos extends Model
{
    public function software(){
        return $this->hasOne('App\Software', 'id', 'software_id');
    }
    public function modulo(){
        return $this->hasOne('App\SoftwareModulos', 'id', 'modulo_id');
    }
}
