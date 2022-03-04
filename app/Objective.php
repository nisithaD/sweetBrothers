<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    public $table = "objectives";

    protected $fillable = [
        'title', 'content'
    ];
}