<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function brands(){
        return $this->hasMany('App\Brand');
    }
    public function products(){
        return $this->hasMany('App\Product');
    }
    public function attributes(){
        return $this->belongsToMany('App\Attribute','attribute_category','category_id','attribute_id')->withPivot('category_name','attribute_name')->withTimestamps();
    }
}
