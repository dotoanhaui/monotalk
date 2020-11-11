<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand(){
        $this->belongsTo('App\Brand', 'brand_id');
    }
    public function category(){
        $this->belongsTo('App\Category', 'category_id');
    }
}
