<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping_cart extends Model
{
	protected $fillable = [
		'id',
		'created_at',
		'updated_at',
		'quantity',
		'produc_id',
		'status',
		'cost'


	];

	public function productos(){
        return $this->hasMany(Product::class, 'id', 'produc_id');
    }
}
