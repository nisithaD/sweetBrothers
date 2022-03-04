<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart_quote extends Model
{
	public $table = "cart_quote";
    protected $guarded = [
        'id'
    ];

    public function getproducts()
    {
        return $this->hasMany('App\products', 'id', 'product_id');
    }
    public function getfeatured()
    {
        return $this->hasMany('App\featured_pages', 'id', 'product_id');
    }
    public function getpackage()
    {
        return $this->hasMany('App\package_types', 'id', 'product_id');
    }
}