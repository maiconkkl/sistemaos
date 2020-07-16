<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planos extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['nome', 'autorizacao', 'atende', 'percentual_atendimento', 'taxa_fixa'];
}
