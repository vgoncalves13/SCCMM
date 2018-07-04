<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';
  
  public function empresas(){
    return $this->belongsTo('App\Empresa','empresas_id');
  }
}
