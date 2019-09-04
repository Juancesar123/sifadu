<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class datasuratmasukApiTest extends TestCase
{
    use MakedatasuratmasukTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedatasuratmasuk()
    {
        $datasuratmasuk = $this->fakedatasuratmasukData();
        $this->json('POST', '/api/v1/datasuratmasuks', $datasuratmasuk);

        $this->assertApiResponse($datasuratmasuk);
    }

    /**
     * @test
     */
    public function testReaddatasuratmasuk()
    {
        $datasuratmasuk = $this->makedatasuratmasuk();
        $this->json('GET', '/api/v1/datasuratmasuks/'.$datasuratmasuk->id);

        $this->assertApiResponse($datasuratmasuk->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedatasuratmasuk()
    {
        $datasuratmasuk = $this->makedatasuratmasuk();
        $editeddatasuratmasuk = $this->fakedatasuratmasukData();

        $this->json('PUT', '/api/v1/datasuratmasuks/'.$datasuratmasuk->id, $editeddatasuratmasuk);

        $this->assertApiResponse($editeddatasuratmasuk);
    }

    /**
     * @test
     */
    public function testDeletedatasuratmasuk()
    {
        $datasuratmasuk = $this->makedatasuratmasuk();
        $this->json('DELETE', '/api/v1/datasuratmasuks/'.$datasuratmasuk->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/datasuratmasuks/'.$datasuratmasuk->id);

        $this->assertResponseStatus(404);
    }
}
