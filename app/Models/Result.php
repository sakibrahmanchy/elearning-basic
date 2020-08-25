<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function options() {
        return $this->hasMany('App\Models\UserOption', 'result_id', 'id');
    }
}
