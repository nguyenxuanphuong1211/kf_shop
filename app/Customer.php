<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'Customers';
    
    public function bill()
        {
        	return $this->belongsTo('App\Bill','bill_id','id');
        }
}
