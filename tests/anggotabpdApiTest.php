<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class anggotabpdApiTest extends TestCase
{
    use MakeanggotabpdTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateanggotabpd()
    {
        $anggotabpd = $this->fakeanggotabpdData();
        $this->json('POST', '/api/v1/anggotabpds', $anggotabpd);

        $this->assertApiResponse($anggotabpd);
    }

    /**
     * @test
     */
    public function testReadanggotabpd()
    {
        $anggotabpd = $this->makeanggotabpd();
        $this->json('GET', '/api/v1/anggotabpds/'.$anggotabpd->id);

        $this->assertApiResponse($anggotabpd->toArray());
    }

    /**
     * @test
     */
    public function testUpdateanggotabpd()
    {
        $anggotabpd = $this->makeanggotabpd();
        $editedanggotabpd = $this->fakeanggotabpdData();

        $this->json('PUT', '/api/v1/anggotabpds/'.$anggotabpd->id, $editedanggotabpd);

        $this->assertApiResponse($editedanggotabpd);
    }

    /**
     * @test
     */
    public function testDeleteanggotabpd()
    {
        $anggotabpd = $this->makeanggotabpd();
        $this->json('DELETE', '/api/v1/anggotabpds/'.$anggotabpd->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anggotabpds/'.$anggotabpd->id);

        $this->assertResponseStatus(404);
    }
}
