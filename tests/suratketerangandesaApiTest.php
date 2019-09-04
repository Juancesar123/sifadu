<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketerangandesaApiTest extends TestCase
{
    use MakesuratketerangandesaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratketerangandesa()
    {
        $suratketerangandesa = $this->fakesuratketerangandesaData();
        $this->json('POST', '/api/v1/suratketerangandesas', $suratketerangandesa);

        $this->assertApiResponse($suratketerangandesa);
    }

    /**
     * @test
     */
    public function testReadsuratketerangandesa()
    {
        $suratketerangandesa = $this->makesuratketerangandesa();
        $this->json('GET', '/api/v1/suratketerangandesas/'.$suratketerangandesa->id);

        $this->assertApiResponse($suratketerangandesa->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratketerangandesa()
    {
        $suratketerangandesa = $this->makesuratketerangandesa();
        $editedsuratketerangandesa = $this->fakesuratketerangandesaData();

        $this->json('PUT', '/api/v1/suratketerangandesas/'.$suratketerangandesa->id, $editedsuratketerangandesa);

        $this->assertApiResponse($editedsuratketerangandesa);
    }

    /**
     * @test
     */
    public function testDeletesuratketerangandesa()
    {
        $suratketerangandesa = $this->makesuratketerangandesa();
        $this->json('DELETE', '/api/v1/suratketerangandesas/'.$suratketerangandesa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratketerangandesas/'.$suratketerangandesa->id);

        $this->assertResponseStatus(404);
    }
}
