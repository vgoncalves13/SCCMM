<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parque extends Model
{
  protected $table = 'parques';
  
   public function ambientes() {
      $this->hasMany('App\Ambiente','parque_id');
    }
  
  public function enderecos() {
    $this->hasMany('App\Endereco','endereco_id');
  }
  
  public function empresas() {
    $this->belongsTo('App\Empresa','empresas_id')
  }
}
