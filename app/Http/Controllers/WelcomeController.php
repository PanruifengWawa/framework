<?php namespace App\Http\Controllers;

use App\Admin;
use App\Comment;
use App\Company;
use App\Question;
use App\User;

class WelcomeController extends Controller {
	
	public function index()
	{
		return view('home');
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
}
