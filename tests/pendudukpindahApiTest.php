<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pendudukpindahApiTest extends TestCase
{
    use MakependudukpindahTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatependudukpindah()
    {
        $pendudukpindah = $this->fakependudukpindahData();
        $this->json('POST', '/api/v1/pendudukpindahs', $pendudukpindah);

        $this->assertApiResponse($pendudukpindah);
    }

    /**
     * @test
     */
    public function testReadpendudukpindah()
    {
        $pendudukpindah = $this->makependudukpindah();
        $this->json('GET', '/api/v1/pendudukpindahs/'.$pendudukpindah->id);

        $this->assertApiResponse($pendudukpindah->toArray());
    }

    /**
     * @test
     */
    public function testUpdatependudukpindah()
    {
        $pendudukpindah = $this->makependudukpindah();
        $editedpendudukpindah = $this->fakependudukpindahData();

        $this->json('PUT', '/api/v1/pendudukpindahs/'.$pendudukpindah->id, $editedpendudukpindah);

        $this->assertApiResponse($editedpendudukpindah);
    }

    /**
     * @test
     */
    public function testDeletependudukpindah()
    {
        $pendudukpindah = $this->makependudukpindah();
        $this->json('DELETE', '/api/v1/pendudukpindahs/'.$pendudukpindah->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pendudukpindahs/'.$pendudukpindah->id);

        $this->assertResponseStatus(404);
    }
}
