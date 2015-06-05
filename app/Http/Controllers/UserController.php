<?php namespace App\Http\Controllers;



use App\User;

class UserController extends Controller {

	/**
	 * store
	 *
	 * @return [type] [description]
	 */
	public function store() {
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
		return $this->responseJSON($user->toJson(), 201);
	}

	public function signIn() {
		return view('users/sign-in');
	}

	public function signUp() {
		return view('users/sign-up');
	}

    public function  changePassword(){
        $email = \Request::input('email');
        $confirm = \Request::input('confirm');
        $newPassword =  \Request::input('password');
        if(!$email || !$confirm || !$newPassword){
            return $this->reportJSONError("请填写完整的信息");
        }
        if($confirm == \Session::get('confirm')){
            try {
                $user = User::where('email', '=', $email)->firstOrFail();
            }catch (ModelNotFoundException $e){
                return $this->reportJSONError("邮箱不存在");
            }
            $user->password = md5($newPassword);
            $user->save();

        }else{
            return $this->reportJSONError("验证码错误");
        }
    }


}
