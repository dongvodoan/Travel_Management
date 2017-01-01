<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TimeApiTest extends TestCase
{
    use MakeTimeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTime()
    {
        $time = $this->fakeTimeData();
        $this->json('POST', '/api/v1/times', $time);

        $this->assertApiResponse($time);
    }

    /**
     * @test
     */
    public function testReadTime()
    {
        $time = $this->makeTime();
        $this->json('GET', '/api/v1/times/'.$time->id);

        $this->assertApiResponse($time->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTime()
    {
        $time = $this->makeTime();
        $editedTime = $this->fakeTimeData();

        $this->json('PUT', '/api/v1/times/'.$time->id, $editedTime);

        $this->assertApiResponse($editedTime);
    }

    /**
     * @test
     */
    public function testDeleteTime()
    {
        $time = $this->makeTime();
        $this->json('DELETE', '/api/v1/times/'.$time->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/times/'.$time->id);

        $this->assertResponseStatus(404);
    }
}
