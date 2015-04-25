<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    public function question(){
        return $this->belongsToMany('App\Question');
    }
}