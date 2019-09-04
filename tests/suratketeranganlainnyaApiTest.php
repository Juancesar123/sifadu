<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketeranganlainnyaApiTest extends TestCase
{
    use MakesuratketeranganlainnyaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratketeranganlainnya()
    {
        $suratketeranganlainnya = $this->fakesuratketeranganlainnyaData();
        $this->json('POST', '/api/v1/suratketeranganlainnyas', $suratketeranganlainnya);

        $this->assertApiResponse($suratketeranganlainnya);
    }

    /**
     * @test
     */
    public function testReadsuratketeranganlainnya()
    {
        $suratketeranganlainnya = $this->makesuratketeranganlainnya();
        $this->json('GET', '/api/v1/suratketeranganlainnyas/'.$suratketeranganlainnya->id);

        $this->assertApiResponse($suratketeranganlainnya->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratketeranganlainnya()
    {
        $suratketeranganlainnya = $this->makesuratketeranganlainnya();
        $editedsuratketeranganlainnya = $this->fakesuratketeranganlainnyaData();

        $this->json('PUT', '/api/v1/suratketeranganlainnyas/'.$suratketeranganlainnya->id, $editedsuratketeranganlainnya);

        $this->assertApiResponse($editedsuratketeranganlainnya);
    }

    /**
     * @test
     */
    public function testDeletesuratketeranganlainnya()
    {
        $suratketeranganlainnya = $this->makesuratketeranganlainnya();
        $this->json('DELETE', '/api/v1/suratketeranganlainnyas/'.$suratketeranganlainnya->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratketeranganlainnyas/'.$suratketeranganlainnya->id);

        $this->assertResponseStatus(404);
    }
}
