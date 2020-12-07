<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function categories(){
        return $this->belongsToMany('App\Category','attribute_category','attribute_id','category_id')->withPivot('category_name','attribute_name')->withTimestamps();
    }
}
