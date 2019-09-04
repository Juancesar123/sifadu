<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketeranganusahaApiTest extends TestCase
{
    use MakesuratketeranganusahaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratketeranganusaha()
    {
        $suratketeranganusaha = $this->fakesuratketeranganusahaData();
        $this->json('POST', '/api/v1/suratketeranganusahas', $suratketeranganusaha);

        $this->assertApiResponse($suratketeranganusaha);
    }

    /**
     * @test
     */
    public function testReadsuratketeranganusaha()
    {
        $suratketeranganusaha = $this->makesuratketeranganusaha();
        $this->json('GET', '/api/v1/suratketeranganusahas/'.$suratketeranganusaha->id);

        $this->assertApiResponse($suratketeranganusaha->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratketeranganusaha()
    {
        $suratketeranganusaha = $this->makesuratketeranganusaha();
        $editedsuratketeranganusaha = $this->fakesuratketeranganusahaData();

        $this->json('PUT', '/api/v1/suratketeranganusahas/'.$suratketeranganusaha->id, $editedsuratketeranganusaha);

        $this->assertApiResponse($editedsuratketeranganusaha);
    }

    /**
     * @test
     */
    public function testDeletesuratketeranganusaha()
    {
        $suratketeranganusaha = $this->makesuratketeranganusaha();
        $this->json('DELETE', '/api/v1/suratketeranganusahas/'.$suratketeranganusaha->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratketeranganusahas/'.$suratketeranganusaha->id);

        $this->assertResponseStatus(404);
    }
}
