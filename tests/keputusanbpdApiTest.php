<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class keputusanbpdApiTest extends TestCase
{
    use MakekeputusanbpdTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatekeputusanbpd()
    {
        $keputusanbpd = $this->fakekeputusanbpdData();
        $this->json('POST', '/api/v1/keputusanbpds', $keputusanbpd);

        $this->assertApiResponse($keputusanbpd);
    }

    /**
     * @test
     */
    public function testReadkeputusanbpd()
    {
        $keputusanbpd = $this->makekeputusanbpd();
        $this->json('GET', '/api/v1/keputusanbpds/'.$keputusanbpd->id);

        $this->assertApiResponse($keputusanbpd->toArray());
    }

    /**
     * @test
     */
    public function testUpdatekeputusanbpd()
    {
        $keputusanbpd = $this->makekeputusanbpd();
        $editedkeputusanbpd = $this->fakekeputusanbpdData();

        $this->json('PUT', '/api/v1/keputusanbpds/'.$keputusanbpd->id, $editedkeputusanbpd);

        $this->assertApiResponse($editedkeputusanbpd);
    }

    /**
     * @test
     */
    public function testDeletekeputusanbpd()
    {
        $keputusanbpd = $this->makekeputusanbpd();
        $this->json('DELETE', '/api/v1/keputusanbpds/'.$keputusanbpd->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/keputusanbpds/'.$keputusanbpd->id);

        $this->assertResponseStatus(404);
    }
}
