<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class datapendudukApiTest extends TestCase
{
    use MakedatapendudukTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedatapenduduk()
    {
        $datapenduduk = $this->fakedatapendudukData();
        $this->json('POST', '/api/v1/datapenduduks', $datapenduduk);

        $this->assertApiResponse($datapenduduk);
    }

    /**
     * @test
     */
    public function testReaddatapenduduk()
    {
        $datapenduduk = $this->makedatapenduduk();
        $this->json('GET', '/api/v1/datapenduduks/'.$datapenduduk->id);

        $this->assertApiResponse($datapenduduk->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedatapenduduk()
    {
        $datapenduduk = $this->makedatapenduduk();
        $editeddatapenduduk = $this->fakedatapendudukData();

        $this->json('PUT', '/api/v1/datapenduduks/'.$datapenduduk->id, $editeddatapenduduk);

        $this->assertApiResponse($editeddatapenduduk);
    }

    /**
     * @test
     */
    public function testDeletedatapenduduk()
    {
        $datapenduduk = $this->makedatapenduduk();
        $this->json('DELETE', '/api/v1/datapenduduks/'.$datapenduduk->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/datapenduduks/'.$datapenduduk->id);

        $this->assertResponseStatus(404);
    }
}
