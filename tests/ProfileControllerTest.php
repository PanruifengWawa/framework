<?php


class ProfileControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        Session::start();
        Session::set('user', $user = \App\User::all()->first());
    }

    public function testStoreBasicSetting()
    {
        $user = Session::get('user');
        $oldDescription = $user->description;
        $description = 'Description ' . (string)rand(0, 100);
        $response = $this->call('POST', '/profile', array(
            'description' => $description,
            '_token' => csrf_token()
        ));
        $newUser = App\User::find($user->id);
//        var_dump($this-)
        $this->assertResponseStatus(302);
        $this->assertEquals($newUser->description, $description);
        $newUser->description = $oldDescription;
        $newUser->save(); // restore original description
    }
}