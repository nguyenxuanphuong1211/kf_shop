<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ['title_1', 'title_2', 'title_3', 'link', 'image'];
}
