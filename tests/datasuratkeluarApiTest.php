<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class datasuratkeluarApiTest extends TestCase
{
    use MakedatasuratkeluarTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedatasuratkeluar()
    {
        $datasuratkeluar = $this->fakedatasuratkeluarData();
        $this->json('POST', '/api/v1/datasuratkeluars', $datasuratkeluar);

        $this->assertApiResponse($datasuratkeluar);
    }

    /**
     * @test
     */
    public function testReaddatasuratkeluar()
    {
        $datasuratkeluar = $this->makedatasuratkeluar();
        $this->json('GET', '/api/v1/datasuratkeluars/'.$datasuratkeluar->id);

        $this->assertApiResponse($datasuratkeluar->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedatasuratkeluar()
    {
        $datasuratkeluar = $this->makedatasuratkeluar();
        $editeddatasuratkeluar = $this->fakedatasuratkeluarData();

        $this->json('PUT', '/api/v1/datasuratkeluars/'.$datasuratkeluar->id, $editeddatasuratkeluar);

        $this->assertApiResponse($editeddatasuratkeluar);
    }

    /**
     * @test
     */
    public function testDeletedatasuratkeluar()
    {
        $datasuratkeluar = $this->makedatasuratkeluar();
        $this->json('DELETE', '/api/v1/datasuratkeluars/'.$datasuratkeluar->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/datasuratkeluars/'.$datasuratkeluar->id);

        $this->assertResponseStatus(404);
    }
}
