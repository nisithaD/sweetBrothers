<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart_prods extends Model
{
	public $table = "cart_prods";
    protected $guarded = [
        'id'
    ];

    public function getproducts()
    {
        return $this->hasMany('App\products', 'id', 'product_id');
    }
}