<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pendudukmeninggalApiTest extends TestCase
{
    use MakependudukmeninggalTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatependudukmeninggal()
    {
        $pendudukmeninggal = $this->fakependudukmeninggalData();
        $this->json('POST', '/api/v1/pendudukmeninggals', $pendudukmeninggal);

        $this->assertApiResponse($pendudukmeninggal);
    }

    /**
     * @test
     */
    public function testReadpendudukmeninggal()
    {
        $pendudukmeninggal = $this->makependudukmeninggal();
        $this->json('GET', '/api/v1/pendudukmeninggals/'.$pendudukmeninggal->id);

        $this->assertApiResponse($pendudukmeninggal->toArray());
    }

    /**
     * @test
     */
    public function testUpdatependudukmeninggal()
    {
        $pendudukmeninggal = $this->makependudukmeninggal();
        $editedpendudukmeninggal = $this->fakependudukmeninggalData();

        $this->json('PUT', '/api/v1/pendudukmeninggals/'.$pendudukmeninggal->id, $editedpendudukmeninggal);

        $this->assertApiResponse($editedpendudukmeninggal);
    }

    /**
     * @test
     */
    public function testDeletependudukmeninggal()
    {
        $pendudukmeninggal = $this->makependudukmeninggal();
        $this->json('DELETE', '/api/v1/pendudukmeninggals/'.$pendudukmeninggal->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pendudukmeninggals/'.$pendudukmeninggal->id);

        $this->assertResponseStatus(404);
    }
}
