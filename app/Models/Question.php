<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = ['lesson_id', 'question_text'];

    public function options() {
        return $this->hasMany('App\Models\Options', 'question_id', 'id');
    }

    public function correctOptionsCount() {
        return $this->options()->where('correct', 1 )->count();
    }

    public function correctOptions() {
       return  $this->options()->where('correct', 1)->get();
    }

    public function topic() {
        return $this->hasOne('App\Models\Topic', 'id', 'topic_id');
    }

}
