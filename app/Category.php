<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
    //Accessors
    public function getNameAttribute($value){
        return ucwords($value);
    }

      //Mutators
  public function setSlugAttribute($value){
    $this->attributes['slug'] = strtolower($value);
}
}
