<?php

class QuestionCommentControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        Session::start();
        Session::set('user', $user = \App\User::all()->first());
    }

    public function testStore()
    {
        $response = $this->call('POST', '/questions/101/comments', [
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

    public function  testShow(){
        $response = $this->call('GET', 'questions/101/comments/2');
        $body = json_decode($response->getContent(), true);

        $comment = \App\Comment::find(2);
        $comment['voted'] = -1;

        $this->assertViewHas('comment',$comment);
    }
}