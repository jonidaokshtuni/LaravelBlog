<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Cartalyst\Sentinel\Users\EloquentUser;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Builder;


class User extends EloquentUser implements AuthenticatableUserContract, AuthenticatableContract
{
    use Notifiable, Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes()
    {
       return $this->hasMany('App\Like');
    }
    public function post(){
        return $this->hasMany('App\Post');
      
}
 //Accessors
 public function getNameAttribute($value){
    return ucwords($value);
}
public function getEmailAttribute($value){
    return strtolower($value);
}

  //Mutators
  public function setNameAttribute($value){
       $this->attributes['name'] = ucwords($value);
  }

  public function getJWTIdentifier()
  {
      return $this->getKey();
  }
  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
      return [];
  }
  //global scope
   public static function boot(){
       parent::boot();
       static::addGlobalScope('created_at', function(Builder $builder){
           return $builder->where('created_at', '<>', null);
       });
   }
}