<?php

class QuestionCommentControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        Session::start();
        Session::set('user', $user = \App\User::all()->first());
    }

    public function testStore()
    {
        $response = $this->call('POST', '/questions/1/comments', [
            'content' => 'This is a comment',
            '_token' => csrf_token()
        ]);

        $body = json_decode($response->getContent(), true);
        $this->assertEquals(201, $response->getStatusCode());

        $this->assertEquals($body['content'], 'This is a comment');
        $this->assertEquals($body['user_id'], Session::get('user')->id);

        // Delete that comment
        App\Comment::find($body['id'])->delete();
    }


    public function testVote(){
        Session::start();

        $user = \App\User::all()->first();
        \Session::put('user', $user);

        $response = $this->call('POST', '/questions/1/comments/1/vote', [
            'vote' => -1,
            '_token' => csrf_token()
        ]);

        $body = json_decode($response->getContent(), true);
        $this->assertEquals(200, $response->getStatusCode());
        //$this->assertEquals($body['down_vote_amount'], 9);
        $this->assertEquals($body['user_id'], Session::get('user')->id);
    }
}