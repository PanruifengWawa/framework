<?php


class CompanyControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        Session::start();
        Session::set('user', $user = \App\User::all()->first());
    }

    public function testIndexWhenNoKeywordIsPresented()
    {
        $response = $this->call('GET', '/companies');

        $body = json_decode($response->getContent(), true);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($body[0]['name'], 'IBM');
    }

    public function testIndexWhenKeywordIsPresented()
    {
        $response = $this->call('GET', '/companies', [
          'keyword' => 'BB'
        ]);

        $body = json_decode($response->getContent(), true);
        var_dump($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(count($body), 0);
    }
}