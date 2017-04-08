<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
}
