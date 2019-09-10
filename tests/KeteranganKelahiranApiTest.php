<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeteranganKelahiranApiTest extends TestCase
{
    use MakeKeteranganKelahiranTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKeteranganKelahiran()
    {
        $keteranganKelahiran = $this->fakeKeteranganKelahiranData();
        $this->json('POST', '/api/v1/keteranganKelahirans', $keteranganKelahiran);

        $this->assertApiResponse($keteranganKelahiran);
    }

    /**
     * @test
     */
    public function testReadKeteranganKelahiran()
    {
        $keteranganKelahiran = $this->makeKeteranganKelahiran();
        $this->json('GET', '/api/v1/keteranganKelahirans/'.$keteranganKelahiran->id);

        $this->assertApiResponse($keteranganKelahiran->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKeteranganKelahiran()
    {
        $keteranganKelahiran = $this->makeKeteranganKelahiran();
        $editedKeteranganKelahiran = $this->fakeKeteranganKelahiranData();

        $this->json('PUT', '/api/v1/keteranganKelahirans/'.$keteranganKelahiran->id, $editedKeteranganKelahiran);

        $this->assertApiResponse($editedKeteranganKelahiran);
    }

    /**
     * @test
     */
    public function testDeleteKeteranganKelahiran()
    {
        $keteranganKelahiran = $this->makeKeteranganKelahiran();
        $this->json('DELETE', '/api/v1/keteranganKelahirans/'.$keteranganKelahiran->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/keteranganKelahirans/'.$keteranganKelahiran->id);

        $this->assertResponseStatus(404);
    }
}
