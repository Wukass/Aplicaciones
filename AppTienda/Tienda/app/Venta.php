<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table="venta";
	protected $primaryKey='id';
    protected $fillable = ['nombre','direccion','productos','precio_total'];
    protected $guarded = ['id'];
}
