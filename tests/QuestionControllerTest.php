<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/24
 * Time: 22:06
 */
class QuestionControllerTest extends TestCase{
    public function testCore(){
        $response = $this->call('GET', 'question/103');

        $body = json_decode($response->getContent(), true);

        $this->assertResponseOk();
        $this->assertEquals(true, isset($body['question']));
        $this->assertEquals(true, isset($body['userCreatingQuestion']));
        $this->assertEquals(true, isset($body['companiesUsingQuestion']));
        $this->assertEquals(true, isset($body['comments']));


        $this->assertEquals('103', $body['question']['id']);
        $this->assertEquals('John Wu', $body['userCreatingQuestion']['name']);
        $this->assertEquals('大潘帝国', $body['companiesUsingQuestion'][0]['name']);
        $this->assertEquals('pan', $body['comments'][0]['user']['name']);


    }
}