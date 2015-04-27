<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/24
 * Time: 22:06
 */
use App\Question;
class QuestionControllerTest extends TestCase{
    public function testShow()
    {
        $response = $this->call('GET', 'questions/1');

        $body = json_decode($response->getContent(), true);

        $question = null;
        try {
            $question = Question::with(['comments','user','companies'])->where('id', '=',  1)->firstOrFail();
            return $question;
        } catch (ModelNotFoundException $e) {
        }


        $this->assertResponseStatus(200);
        $this->assertViewHas('question',$question);




    }



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

        $body = json_decode($response->getContent(), true);
        $this->assertEquals(200, $response->getStatusCode());

        $questions[0] = \App\Question::find($body[0]);
        $questions[1] = \App\Question::find($body[1]);
        $this->assertTrue($questions[0] != null);
        $this->assertEquals($questions[0]->content, 'Question 1');
        $this->assertTrue($questions[1] != null);
        $this->assertEquals($questions[1]->content, 'Question 2');
    }
}