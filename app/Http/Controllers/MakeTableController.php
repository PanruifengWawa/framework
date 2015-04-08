<?php namespace App\Http\Controllers;




use Illuminate\Support\Facades\Schema;

class MakeTableController extends Controller {

	public function index($param) {
		if($param == 'all'){
			$this->admins();
			$this->users();
			$this->companys();
			$this->comments();
			$this->questions();
		}else
			return call_user_func(array('App\Http\Controllers\MakeTableController', $param));
	}

	public function users() {
		Schema::create('users',function($table){
			$table->increments('id');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->string('name',50);
			$table->string('email',50);
			$table->string('password',50);
			$table->string('avatar',250);
			$table->unique('email');
		});
		return 'OK';
	}

	public function admins() {
		Schema::create('admins', function($table){
			$table->increments('id');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->string('username',50);
			$table->string('password',50);
		});
		return 'OK';
	}

	public function companys() {
		Schema::create('companies', function($table){
			$table->increments('id');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->string('name',50);
			$table->string('email',50);
			$table->string('password',50);
			$table->text('description');
		});
	}

	public function comments() {
		Schema::create('comments', function($table){
			$table->increments('id');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->text('content');
			$table->integer('user')->unsigned();
			$table->foreign('user')->references('id')->on('users');
			$table->string('father',20);
		});
		return 'OK';
	}

public function questions() {
	Schema::create('questions', function($table){
		$table->increments('id');
		$table->dateTime('created_at');
		$table->dateTime('updated_at');
		$table->text('content');
		$table->integer('user')->unsigned();
		$table->foreign('user')->references('id')->on('users');
		$table->integer('company')->unsigned();
		$table->foreign('company')->references('id')->on('companies');
		$table->string('position',50);
		$table->text('comments');
		$table->text('users');
	});
}
}