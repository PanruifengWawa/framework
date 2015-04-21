<?php namespace App\Http\Controllers;

use App\Admin;
use App\Comment;
use App\Company;
use App\Question;
use App\User;

class WelcomeController extends Controller {

	public function index()
	{
		$user = \Session::get('user');
		if($user){
			$questions = Question::where('user_id', '=', $user->id)->paginate(20);
		}
		return view('home', ['question' => $questions]);
	}

	public function test()
	{
		$user = User::all();
		$admin = Admin::all();
		$comment = Comment::all();
		$company = Company::all();
		$question = Question::all();
		return view('test/a');
	}

    public function  wawa()
    {
        return view('test/wawa');
    }
}
