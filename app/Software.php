<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    public function versions(){
        return $this->hasMany('App\SoftwareVersions', 'software_id', 'id');
    }
    public function modulos(){
        return $this->hasMany('App\SoftwareModulos', 'software_id', 'id');
    }
}
