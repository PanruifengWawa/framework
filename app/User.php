<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
  protected $fillable = array('name',
                              'email',
                              'password',
                              'avatar');

  public function toJson($options = 0) {
    // 隐藏密码字段
    $this->setHidden(['password']);
    return parent::toJson($options);
  }

  public function questions() {
    return $this->hasMany('App\Question');
  }
}
