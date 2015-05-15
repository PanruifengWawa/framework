<?php

class WelcomeControllerTest extends TestCase {


	public function testIndex()
	{
		Session::start();
		Session::set('user',$user = \App\User::all()->first());
		// $questions = \App\Question::where('user_id', '=', $user->id)->paginate(20);
		$response = $this->call('GET','/',[]);

		$this->assertResponseStatus(200);
		// $this->assertViewHas("questions", $questions);
		$this->assertViewHas("user", $user);
		$this->assertViewHas("show_profile", true);
	}

	public function testIndexMy()
	{
		Session::start();
		Session::set('user',$user = \App\User::all()->first());
		// $questions = \App\Question::where('user_id', '=', $user->id)->paginate(20);
		$response = $this->call('GET','/questions/my',[]);

		$this->assertResponseStatus(200);
		// $this->assertViewHas("questions", $questions);
		$this->assertViewHas("user", $user);
		$this->assertViewHas("show_profile", false);
	}
}