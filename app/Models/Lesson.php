<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lesson extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'title', 'description'
    ];

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }

    public function questions() {
        return $this->hasMany('App\Models\Question');
    }

}
