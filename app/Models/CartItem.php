<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
	use HasFactory;

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	// Not sure if the above relation is correct. Alternatively you can replace it with this accessor method
	// public function getProductAttribute()
	// {
	// 	return Product::find($this->product_id);
	// }
}
