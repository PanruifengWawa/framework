<?php


class QuestionControllerTest extends TestCase{

    public function testStore()
    {
        Session::start();

        $user = \App\User::all()->first();

        $response = $this->call('POST', '/questions', [
            'company_name' => 'IBM',
            'position_name' => 'Front-end Engineer',
            'user_id' => $user->id,
            'questions' => json_encode(
                array('Question 1', 
                    'Question 2')
            ),
            '_token' => csrf_token(),
        ]);

        $body = $response->getContent();
        $this->assertEquals(200, $response->getStatusCode());
        
        $question[0] = \App\Question::find()
    }
}