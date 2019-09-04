<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketerangantidakmampuApiTest extends TestCase
{
    use MakesuratketerangantidakmampuTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratketerangantidakmampu()
    {
        $suratketerangantidakmampu = $this->fakesuratketerangantidakmampuData();
        $this->json('POST', '/api/v1/suratketerangantidakmampus', $suratketerangantidakmampu);

        $this->assertApiResponse($suratketerangantidakmampu);
    }

    /**
     * @test
     */
    public function testReadsuratketerangantidakmampu()
    {
        $suratketerangantidakmampu = $this->makesuratketerangantidakmampu();
        $this->json('GET', '/api/v1/suratketerangantidakmampus/'.$suratketerangantidakmampu->id);

        $this->assertApiResponse($suratketerangantidakmampu->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratketerangantidakmampu()
    {
        $suratketerangantidakmampu = $this->makesuratketerangantidakmampu();
        $editedsuratketerangantidakmampu = $this->fakesuratketerangantidakmampuData();

        $this->json('PUT', '/api/v1/suratketerangantidakmampus/'.$suratketerangantidakmampu->id, $editedsuratketerangantidakmampu);

        $this->assertApiResponse($editedsuratketerangantidakmampu);
    }

    /**
     * @test
     */
    public function testDeletesuratketerangantidakmampu()
    {
        $suratketerangantidakmampu = $this->makesuratketerangantidakmampu();
        $this->json('DELETE', '/api/v1/suratketerangantidakmampus/'.$suratketerangantidakmampu->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratketerangantidakmampus/'.$suratketerangantidakmampu->id);

        $this->assertResponseStatus(404);
    }
}
