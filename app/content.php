<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
	public $table = "content";
    protected $guarded = [
        'id'
    ];

    public function getbanners()
	{
	    return $this->hasMany('App\Banners', 'page', 'page_name')->orderby('sort_order', 'asc');
	}
}
