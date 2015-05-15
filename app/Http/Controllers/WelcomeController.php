<?php namespace App\Http\Controllers;

use App\Question;

class WelcomeController extends Controller {

	public function index()
	{
		$user = \Session::get('user');
		$questions = Question::with(['companies', 'comments'])
			->orderBy('created_at', 'desc')
			->paginate(20);
		return view('home', [
				'questions' => $questions,
				'user' => $user,
				'show_profile' => true
			]);
	}

	public function indexMy() {
		$user = \Session::get('user');
		$questions = Question::with(['companies', 'comments'])
			->where('user_id', '=', $user->id)
			->orderBy('created_at', 'desc')
			->paginate(20);
		return view('home', [
				'questions' => $questions,
				'user' => $user,
				'show_profile' => false
			]);
	}

}
