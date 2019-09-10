<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeteranganMenikahApiTest extends TestCase
{
    use MakeKeteranganMenikahTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKeteranganMenikah()
    {
        $keteranganMenikah = $this->fakeKeteranganMenikahData();
        $this->json('POST', '/api/v1/keteranganMenikahs', $keteranganMenikah);

        $this->assertApiResponse($keteranganMenikah);
    }

    /**
     * @test
     */
    public function testReadKeteranganMenikah()
    {
        $keteranganMenikah = $this->makeKeteranganMenikah();
        $this->json('GET', '/api/v1/keteranganMenikahs/'.$keteranganMenikah->id);

        $this->assertApiResponse($keteranganMenikah->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKeteranganMenikah()
    {
        $keteranganMenikah = $this->makeKeteranganMenikah();
        $editedKeteranganMenikah = $this->fakeKeteranganMenikahData();

        $this->json('PUT', '/api/v1/keteranganMenikahs/'.$keteranganMenikah->id, $editedKeteranganMenikah);

        $this->assertApiResponse($editedKeteranganMenikah);
    }

    /**
     * @test
     */
    public function testDeleteKeteranganMenikah()
    {
        $keteranganMenikah = $this->makeKeteranganMenikah();
        $this->json('DELETE', '/api/v1/keteranganMenikahs/'.$keteranganMenikah->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/keteranganMenikahs/'.$keteranganMenikah->id);

        $this->assertResponseStatus(404);
    }
}
