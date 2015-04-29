<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
        $user->save();
        return redirect('profile');
    }

}
