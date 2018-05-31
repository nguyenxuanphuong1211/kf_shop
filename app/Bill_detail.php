<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table = 'Bill_detail';

    public function bill()
    {
    	return $this->belongsTo('App\Bill','bill_id', 'id');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id','id');
    }
}
