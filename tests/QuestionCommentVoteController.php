<?php
/**
 * Created by PhpStorm.
 * User: 1Sh1ne
 * Date: 2015/5/16
 * Time: 15:26
 */

class QuestionCommentVoteController extends TestCase{

    public function setUp() {
        parent::setUp();
        Session::start();
        Session::set('user', $user = \App\User::all()->first());
    }

    public function testStore(){
        Session::start();

        $user = \App\User::all()->first();
        \Session::put('user', $user);

        $response = $this->call('POST', '/questions/1/comments/1', [
                'vote' => 1,
                '_token' => csrf_token()
        ]);

        $body = json_decode($response->getContent(), true);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals($body['up_vote_amount'], 11);
        $this->assettEquals($body['user_id'], Session::get('user')->id);
    }
}