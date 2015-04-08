<?php namespace App\Http\Controllers;


use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LoginController extends Controller {
	public function index() {
		return 'login';
	}

	public function login() {
		if (!\Request::isMethod('post')) {
			return '404';
		}
		$username = \Request::input('username', null);
		$password = \Request::input('password', null);
		if (!$username || !$password) {
			return '404';
		}
		try{
			$user = User::where('username', '=', $username)->firstOrFail();
			\Session::put('user',$user);
		}catch (ModelNotFoundException $e){
			return "该用户名不存在";
		}
		return \Redirect::to('/');
	}

	public function register() {
		if (!\Request::isMethod('post')) {
			return '404';
		}
		$username = \Request::input('username');
		$password = \Request::input('password');
		$email = \Request::input('email');
		if(User::where('username', '=', $username)->count() != 0){
			return "该用户名已被注册";
		}
		$user = new User();
		$user->name = $username;
		$user->password = $password;
		$user->email = $email;
		$user->avatar = '';
		$user->save();
		\Session::put('user',$user);
		return \Redirect::to('/');
	}
}