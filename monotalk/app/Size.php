<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function attribute(){
        return $this->belongsTo('App\Attribute');
    }
    public function child_products(){
        return $this->hasMany('App\ChildProduct','size_id');
    }
}
