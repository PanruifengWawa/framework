<?php namespace App\Http\Controllers;



use App\User;

class UserController extends Controller {

	public function login() {
		if (!\Request::isMethod('post')) {
			return $this->reportJSONError("非法请求");
		}
		$username = \Request::input('username', null);
		$password = \Request::input('password', null);
		if (!$username || !$password) {
			return $this->reportJSONError("用户名和密码不能为空");
		}
		try {
			$user = User::where('username', '=', $username)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return $this->reportJSONError("该用户名不存在");
		}
		if(md5($password) != $user->password)
			return $this->reportJSONError("密码错误");
		\Session::put('user', $user);
		return \Response::json(['error'=>"登陆成功"]);
	}

	public function register() {
		if (!\Request::isMethod('post')) {
			return $this->reportJSONError("非法请求");
		}
		$username = \Request::input('username');
		$password = \Request::input('password');
		$email = \Request::input('email');
		if (!$username || !$password || !$email) {
			return $this->reportJSONError("用户名、密码和邮箱不能为空");
		}
		if (User::where('name', '=', $username)->count() != 0) {
			return $this->reportJSONError("该用户名已被注册");
		}
		$user = new User();
		$user->name = $username;
		$user->password = md5($password);
		$user->email = $email;
		$user->avatar = '';
		$user->save();
		\Session::put('user', $user);
		return \Response::json(['error'=>'注册成功']);
	}

}
