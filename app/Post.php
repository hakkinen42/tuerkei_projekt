<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  
    protected $fillable = ['name', 'beschreibung','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function replies(){
        return $this->hasMany('App\Reply');
    }
}
