<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_order extends Model
{
	public $table = "master_order";
	 protected $guarded = [
	     'id'
	 ];

	 public function cartproducts()
	 {
	 	return $this->hasMany('App\master_product', 'master_order_id', 'id');

	 }

	 public function products()
	 {
	     return $this->hasMany('App\master_product', 'master_order_id', 'id');
	 }
}
