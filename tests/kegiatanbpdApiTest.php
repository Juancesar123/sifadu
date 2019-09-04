<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class kegiatanbpdApiTest extends TestCase
{
    use MakekegiatanbpdTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatekegiatanbpd()
    {
        $kegiatanbpd = $this->fakekegiatanbpdData();
        $this->json('POST', '/api/v1/kegiatanbpds', $kegiatanbpd);

        $this->assertApiResponse($kegiatanbpd);
    }

    /**
     * @test
     */
    public function testReadkegiatanbpd()
    {
        $kegiatanbpd = $this->makekegiatanbpd();
        $this->json('GET', '/api/v1/kegiatanbpds/'.$kegiatanbpd->id);

        $this->assertApiResponse($kegiatanbpd->toArray());
    }

    /**
     * @test
     */
    public function testUpdatekegiatanbpd()
    {
        $kegiatanbpd = $this->makekegiatanbpd();
        $editedkegiatanbpd = $this->fakekegiatanbpdData();

        $this->json('PUT', '/api/v1/kegiatanbpds/'.$kegiatanbpd->id, $editedkegiatanbpd);

        $this->assertApiResponse($editedkegiatanbpd);
    }

    /**
     * @test
     */
    public function testDeletekegiatanbpd()
    {
        $kegiatanbpd = $this->makekegiatanbpd();
        $this->json('DELETE', '/api/v1/kegiatanbpds/'.$kegiatanbpd->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kegiatanbpds/'.$kegiatanbpd->id);

        $this->assertResponseStatus(404);
    }
}
