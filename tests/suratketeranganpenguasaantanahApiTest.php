<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketeranganpenguasaantanahApiTest extends TestCase
{
    use MakesuratketeranganpenguasaantanahTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratketeranganpenguasaantanah()
    {
        $suratketeranganpenguasaantanah = $this->fakesuratketeranganpenguasaantanahData();
        $this->json('POST', '/api/v1/suratketeranganpenguasaantanahs', $suratketeranganpenguasaantanah);

        $this->assertApiResponse($suratketeranganpenguasaantanah);
    }

    /**
     * @test
     */
    public function testReadsuratketeranganpenguasaantanah()
    {
        $suratketeranganpenguasaantanah = $this->makesuratketeranganpenguasaantanah();
        $this->json('GET', '/api/v1/suratketeranganpenguasaantanahs/'.$suratketeranganpenguasaantanah->id);

        $this->assertApiResponse($suratketeranganpenguasaantanah->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratketeranganpenguasaantanah()
    {
        $suratketeranganpenguasaantanah = $this->makesuratketeranganpenguasaantanah();
        $editedsuratketeranganpenguasaantanah = $this->fakesuratketeranganpenguasaantanahData();

        $this->json('PUT', '/api/v1/suratketeranganpenguasaantanahs/'.$suratketeranganpenguasaantanah->id, $editedsuratketeranganpenguasaantanah);

        $this->assertApiResponse($editedsuratketeranganpenguasaantanah);
    }

    /**
     * @test
     */
    public function testDeletesuratketeranganpenguasaantanah()
    {
        $suratketeranganpenguasaantanah = $this->makesuratketeranganpenguasaantanah();
        $this->json('DELETE', '/api/v1/suratketeranganpenguasaantanahs/'.$suratketeranganpenguasaantanah->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratketeranganpenguasaantanahs/'.$suratketeranganpenguasaantanah->id);

        $this->assertResponseStatus(404);
    }
}
