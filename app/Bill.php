<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'Bills';

    public function customers()
        {
        	return $this->hasMany('App\Customer','bill_id','id');
        }

    public function bill_detail()
    {
    	return $this->hasMany('App\Bill_detail', 'bill_id','id');
    }
}
