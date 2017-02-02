<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table="proveedor";
	protected $primaryKey='id';
    protected $fillable = ['nombre','pais'];
    protected $guarded = ['id'];
	
	public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
