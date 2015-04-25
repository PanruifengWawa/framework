<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/24
 * Time: 22:06
 */
class QuestionControllerTest extends TestCase{
    public function testShow(){
        $response = $this->call('GET', 'question/3');

        $body = json_decode($response->getContent(), true);

        $this->assertResponseStatus(200);
      /*  $this->assertEquals(true, isset($body['question']));
        $this->assertEquals(true, isset($body['userCreatingQuestion']));
        $this->assertEquals(true, isset($body['companiesUsingQuestion']));
        $this->assertEquals(true, isset($body['comments']));*/




    }
}