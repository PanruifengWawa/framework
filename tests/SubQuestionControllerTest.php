<?php


class SubQuestionControllerTest {
    public function testSubmit()
    {
        Session::start();
        $response = $this->call('POST', '/question/create', [
            'company_name' => '',
            'position_name' => '',
            'user_id' => '',
            'questions' => json_encode(array('111', '222', '333'))
        ]);
        $body = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
    }
}