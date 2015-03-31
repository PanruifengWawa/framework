<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	protected $fillable = array(
		'content',
		'user',
		'users',
		'company',
		'comments',
		'position'
	);
}
