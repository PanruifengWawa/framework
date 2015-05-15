<?php


class ProfileControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        Session::start();
        Session::set('user', $user = \App\User::where('email', '=', 'test1@interu.com')->get()[0]);
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

    public function testStoreSecuritySetting()
    {
        $user = Session::get('user');
        $this->call('POST', '/profile/security', array(
            'password' => '123456',
            'newPassword' => '234567',
            '_token' => csrf_token()
        ));
        $newUser = App\User::find($user->id);
        $this->assertEquals($newUser->password, md5('234567'));
        $newUser->password = md5('123456');
        $newUser->save();
    }
}