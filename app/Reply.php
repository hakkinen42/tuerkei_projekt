<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['user_id', 'comment_id','content'];
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
