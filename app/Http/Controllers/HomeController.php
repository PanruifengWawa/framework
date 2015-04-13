<?php namespace App\Http\Controllers;

use App\Question;

class HomeController extends Controller {

	public function index() {
		$data = [];
		$questions = Question::paginate(15);
		$data['questions'] = $questions;
		return \View::make('test/a',array('questions' => $questions));
	}
}
