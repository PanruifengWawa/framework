<?php namespace App\Http\Controllers;



use App\User;

class UserController extends Controller {

	/**
	 * login - create session
	 * 
	 * @httpmethod POST
	 * 
	 * @return [type] [description]
	 */
	public function login() {
		if (!\Request::isMethod('post')) {
			return $this->reportJSONError("非法请求");
		}
		$email = \Request::input('email', null);
		$password = \Request::input('password', null);
		if (!$email || !$password) {
			return $this->reportJSONError("用户名和密码不能为空");
		}
		try {
			$user = User::where('email', '=', $email)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return $this->reportJSONError("该用户名不存在");
		}
		if(md5($password) != $user->password)
			return $this->reportJSONError("密码错误");
		\Session::put('user', $user);
		return $user->toJson();
	}

	/**
	 * register
	 *
	 * @httpmethod POST
	 * 
	 * @return [type] [description]
	 */
	public function register() {
		if (!\Request::isMethod('post')) {
			return $this->reportJSONError("非法请求");
		}
		$name = \Request::input('name');
		$password = \Request::input('password');
		$email = \Request::input('email');
		if (!$name || !$password || !$email) {
			return $this->reportJSONError("用户名、密码和邮箱不能为空");
		}
		if (User::where('name', '=', $name)->count() != 0) {
			return $this->reportJSONError("该用户名已被注册");
		}
		if (User::where('email', '=', $email)->count() != 0) {
			return $this->reportJSONError("该邮箱已被注册");
		}
		$user = new User();
		$user->name = $name;
		$user->password = md5($password);
		$user->email = $email;
		$user->save();
		return \Response::json(['error'=>'注册成功']);
	}

	public function signIn() {
		return view('user/sign-in');
	}

	public function signUp() {
		return view('user/signUp');
	}
}
