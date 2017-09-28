<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    protected $fillable = ['question', 'correct_answer', 'answers', 'admin_id'];

    public function answers () {


    	return $this->hasMany('App\Answer','user_id');
    }

    public function admins () {


    	return $this->belongsTo('App\Admin');
    }

    /*

    public function setQuestionAttribute($question) {

        $this->attribute['question'] = str_slug($this->attribute['question']);
    }

    public function getQuestionAttribute ($question) {

        return $this->attribute['question'] = str_slug($this->attribute['question'], ' ');
    } */

    public function users () {


    	return $this->belongsToMany('App\User');
    }

    public function getQuestionAttribute($question) {

        return str_slug($question);
    }
}
