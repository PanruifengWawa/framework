<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
	protected $fillable = array(
		'name',
		'email',
		'password',
		'description'
	);
}