<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'alias', 'image'];
    public function products()
    {
    	return $this->hasMany('App\Product', 'brand_id', 'id');
    }
}
