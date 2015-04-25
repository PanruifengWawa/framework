<?php

class WlecomeControllerTest extends TestCase {


	public function testIndex()
	{
		Session::start();
		Session::set('user',\App\User::all()->first());
		$response = $this->call('GET','/',[]);

		
	}
}