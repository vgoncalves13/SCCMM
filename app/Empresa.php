<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
  protected $table = 'empresas';
  protected $guarded = [];
  
  public function enderecos(){
    return $this->hasMany('App\Endereco','empresas_id');
  }
  
  protected static function boot() {
    parent::boot();
    
    static::deleting(function($empresa){
      foreach($empresa->enderecos as $endereco){
        $endereco->delete();
      }
    });
  }
  
}
