<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_quote extends Model
{
	public $table = "master_quote";
	 protected $guarded = [
	     'id'
	 ];

	 public function cartproducts()
	 {
	 	return $this->hasMany('App\master_quote_prods', 'quote_id', 'id');

	 }

	 public function products()
	 {
	     return $this->hasMany('App\master_quote_prods', 'quote_id', 'id');
	 }
}
