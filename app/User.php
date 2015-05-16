<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
  protected $fillable = array('name', 'email', 'password', 'avatar');
  
  function __construct() {
    $this->setHidden(['password', 'is_admin', 'company_id', 'is_company']);
  }

  public function questions() {
    return $this->hasMany('App\Question');
  }

  public function company() {
    return $this->hasOne('App\Company');
  }

    public function comments(){
        return $this->belongsToMany('App\Comment');
    }


    public function verifyPassword($password) {
        $index = array_search('password', $this->hidden);
        $result = md5($password) === $this->password;
        $this->addHidden('password');
        return $result;
    }
}
