<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_product extends Model
{
    public $table = "master_product";
	 protected $guarded = [
	     'id'
	 ];
}
