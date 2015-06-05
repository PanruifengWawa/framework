<?php

use App\User;

class UserControllerTest extends TestCase {

  /**
   * Test store
   *
   * @return void
   */
  public function testStore()
  {
    Session::start();
    $response = $this->call('POST', '/users', [
      'email' => 'test4@interu.com',
      'password' => '234567',
      'name' => 'John Wu (2)',
      '_token' => csrf_token(),
    ]);

    $body = json_decode($response->getContent(), true);

    $this->assertEquals(201, $response->getStatusCode());
    $this->assertEquals('test4@interu.com', $body['email']);
    $this->assertEquals(false, isset($body['password']));

    $user = User::where('email', '=', 'test4@interu.com')->firstOrFail();
    $user->delete();
  }
    public function testChangePassword(){
        Session::start();
        Session::set('confirm', '1234');
        $response = $this->call('POST', '/change-password', [
            'email' => 'test1@interu.com',
            'password' => '234567',
            'confirm' => '1234',
        ]);

        $user = User::where('email', '=', 'test1@interu.com')->firstOrFail();
        $this->assertEquals($user->password, '234567');
    }


}
