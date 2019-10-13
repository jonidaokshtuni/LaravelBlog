<?php

namespace App;

use App\Scopes\ActiveScope;
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
    //global scope
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
    //local scope
    public function scopePublished($query)
    {
        return $query->where('publish_date','<',\Carbon\Carbon::now());
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
