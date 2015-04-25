<?php


class QuestionControllerTest extends TestCase{

    public function testStore()
    {
        Session::start();
        $response = $this->call('POST', '/question', [
            'company_name' => '大潘帝国',
            'position_name' => 'value',
            'user_id' => '3',
            'questions' => json_encode(array('111', '222', '333')),
            '_token' => csrf_token(),
        ]);

        $body = $response->getContent();
        $this->assertEquals(200, $response->getStatusCode());

    }
}