<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'id',
		'name',
		'quantity',
		'lot_number',
		'expiration_date',
		'price',
		'created_at',
		'updated_at'
	];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
