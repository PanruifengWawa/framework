<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
  protected $fillable = array('content');

	public function user() {
		return $this->belongsToMany('App\User');
	}
}