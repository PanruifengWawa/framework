<?php namespace App;


use Illuminate\Database\Eloquent\Model;

Class Admin extends Model {
	protected $fillable = array(
		'username',
		'password'
	);
}