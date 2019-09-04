<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class dataekspedisiApiTest extends TestCase
{
    use MakedataekspedisiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedataekspedisi()
    {
        $dataekspedisi = $this->fakedataekspedisiData();
        $this->json('POST', '/api/v1/dataekspedisis', $dataekspedisi);

        $this->assertApiResponse($dataekspedisi);
    }

    /**
     * @test
     */
    public function testReaddataekspedisi()
    {
        $dataekspedisi = $this->makedataekspedisi();
        $this->json('GET', '/api/v1/dataekspedisis/'.$dataekspedisi->id);

        $this->assertApiResponse($dataekspedisi->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedataekspedisi()
    {
        $dataekspedisi = $this->makedataekspedisi();
        $editeddataekspedisi = $this->fakedataekspedisiData();

        $this->json('PUT', '/api/v1/dataekspedisis/'.$dataekspedisi->id, $editeddataekspedisi);

        $this->assertApiResponse($editeddataekspedisi);
    }

    /**
     * @test
     */
    public function testDeletedataekspedisi()
    {
        $dataekspedisi = $this->makedataekspedisi();
        $this->json('DELETE', '/api/v1/dataekspedisis/'.$dataekspedisi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dataekspedisis/'.$dataekspedisi->id);

        $this->assertResponseStatus(404);
    }
}
