<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketerangandomisiliApiTest extends TestCase
{
    use MakesuratketerangandomisiliTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratketerangandomisili()
    {
        $suratketerangandomisili = $this->fakesuratketerangandomisiliData();
        $this->json('POST', '/api/v1/suratketerangandomisilis', $suratketerangandomisili);

        $this->assertApiResponse($suratketerangandomisili);
    }

    /**
     * @test
     */
    public function testReadsuratketerangandomisili()
    {
        $suratketerangandomisili = $this->makesuratketerangandomisili();
        $this->json('GET', '/api/v1/suratketerangandomisilis/'.$suratketerangandomisili->id);

        $this->assertApiResponse($suratketerangandomisili->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratketerangandomisili()
    {
        $suratketerangandomisili = $this->makesuratketerangandomisili();
        $editedsuratketerangandomisili = $this->fakesuratketerangandomisiliData();

        $this->json('PUT', '/api/v1/suratketerangandomisilis/'.$suratketerangandomisili->id, $editedsuratketerangandomisili);

        $this->assertApiResponse($editedsuratketerangandomisili);
    }

    /**
     * @test
     */
    public function testDeletesuratketerangandomisili()
    {
        $suratketerangandomisili = $this->makesuratketerangandomisili();
        $this->json('DELETE', '/api/v1/suratketerangandomisilis/'.$suratketerangandomisili->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratketerangandomisilis/'.$suratketerangandomisili->id);

        $this->assertResponseStatus(404);
    }
}
