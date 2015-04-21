<?php

class UserControllerTest extends TestCase {

  /**
   * Test login
   *
   * @return void
   */
  public function testLogin()
  {
    Session::start();
    $response = $this->call('POST', '/user/login', [
      'email' => 'test1@interu.com',
      'password' => '123456',
      '_token' => csrf_token(),
    ]);

    $body = json_decode($response->getContent(), true);

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('test1@interu.com', $body['email']);
    $this->assertEquals(false, isset($body['password']));
  }

}
