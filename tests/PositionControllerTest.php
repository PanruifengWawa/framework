<?php


class PositionControllerTest extends TestCase {

    public function testIndexWhenNotKeywordIsPresented()
    {
        $response = $this->call('GET', '/positions');

        $body = json_decode($response->getContent(), true);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($body[0]['title'], 'Front-end Engineer');
    }

    public function testIndexWhenKeywordIsPresented()
    {
        $response = $this->call('GET', '/positions', [
          'keyword' => 'BB'
        ]);

        $body = json_decode($response->getContent(), true);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(count($body), 0);
    }
}