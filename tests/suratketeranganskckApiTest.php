<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketeranganskckApiTest extends TestCase
{
    use MakesuratketeranganskckTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratketeranganskck()
    {
        $suratketeranganskck = $this->fakesuratketeranganskckData();
        $this->json('POST', '/api/v1/suratketeranganskcks', $suratketeranganskck);

        $this->assertApiResponse($suratketeranganskck);
    }

    /**
     * @test
     */
    public function testReadsuratketeranganskck()
    {
        $suratketeranganskck = $this->makesuratketeranganskck();
        $this->json('GET', '/api/v1/suratketeranganskcks/'.$suratketeranganskck->id);

        $this->assertApiResponse($suratketeranganskck->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratketeranganskck()
    {
        $suratketeranganskck = $this->makesuratketeranganskck();
        $editedsuratketeranganskck = $this->fakesuratketeranganskckData();

        $this->json('PUT', '/api/v1/suratketeranganskcks/'.$suratketeranganskck->id, $editedsuratketeranganskck);

        $this->assertApiResponse($editedsuratketeranganskck);
    }

    /**
     * @test
     */
    public function testDeletesuratketeranganskck()
    {
        $suratketeranganskck = $this->makesuratketeranganskck();
        $this->json('DELETE', '/api/v1/suratketeranganskcks/'.$suratketeranganskck->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratketeranganskcks/'.$suratketeranganskck->id);

        $this->assertResponseStatus(404);
    }
}
