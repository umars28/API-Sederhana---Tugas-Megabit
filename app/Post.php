<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','title','description','users_id'];

    public function user() {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
}
