<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'alias', 'image', 'description_detail',
     'description_brief', 'hot', 'deals', 'new', 'quantity', 'unit_price',
      'promotion_price', 'unit', 'brand_id', 'category_id'];

    public function bill_details()
    {
    	return $this->hasMany('App\bill_detail','product_id', 'id');
    }
    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id','id');
    }
	public function brand()
    {
    	return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }
    public function images()
    {
    	return $this->hasMany('App\Image', 'product_id', 'id');
    }
}
