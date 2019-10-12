<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tag');
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
