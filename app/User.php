<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
  protected $fillable = array('name',
                              'email',
                              'password',
                              'avatar');

  public function questions() {
    return $this->hasMany('App\Question');
  }
}
