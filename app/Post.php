<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category','category_post');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function likes(){
        return $this->belongsTo('App\Like');
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
