<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use League\Flysystem\Exception;

class ProfileController extends Controller {

	public function basicSetting()
	{
        $user = \Session::get('user');
		return view('profile.basic-setting', array(
            'user' => $user
        ));
	}

    public function storeBasicSetting()
    {
        $user = \Session::get('user');
        if ($description = \Request::input('description')) {
            $user->description = $description;
        }
        if ($avatar = \Request::input('avatar')) {
            $user->avatar = $avatar;
        }
        $user->save();
        return redirect('profile');
    }

    public function securitySetting()
    {
        $user = \Session::get('user');
        return view('profile.security-setting', array(
            'user' => $user
        ));
    }

    public function storeSecuritySetting()
    {
        $user = \Session::get('user');
        $password = \Request::input('password');
        $newPassword = \Request::input('newPassword');
        if ($user->verifyPassword($password)) {
            // TODO: tell user the password is wrong
            return redirect('profile/security');
        }
        $user->password = md5($newPassword);
        $user->save();
        \Session::remove('user');
        return redirect('/sign-in');
    }

}
