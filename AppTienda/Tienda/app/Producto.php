<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table="producto";
	protected $primaryKey='id';
    protected $fillable = ['nombre','precio','Marca','stock','id_proveedor'];
    protected $guarded = ['id'];
	
	public function proveedor()
    {
    	return $this->belongsTo('App\Proveedor');
    }
}
