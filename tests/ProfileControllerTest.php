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
        $oldAvatar = $user->avatar;
        $description = 'Description ' . (string)rand(0, 100);
        $avatar = 'http://placehold.it/80x' . (string)rand(100, 102);
        $this->call('POST', '/profile', array(
            'description' => $description,
            'avatar' => $avatar,
            '_token' => csrf_token()
        ));
        $newUser = App\User::find($user->id);
        $this->assertResponseStatus(302);
        $this->assertEquals($newUser->description, $description);
        $this->assertEquals($newUser->avatar, $avatar);
        $newUser->description = $oldDescription;
        $newUser->avatar = $oldAvatar;
        $newUser->save(); // restore original description
    }
}