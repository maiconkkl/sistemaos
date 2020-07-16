<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwareModulos extends Model
{
    public function software(){
        return $this->hasOne('App\Software', 'id', 'software_id');
    }
}
