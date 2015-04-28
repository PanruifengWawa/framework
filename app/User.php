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
}
