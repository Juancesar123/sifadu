<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeteranganUsahaBaruApiTest extends TestCase
{
    use MakeKeteranganUsahaBaruTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKeteranganUsahaBaru()
    {
        $keteranganUsahaBaru = $this->fakeKeteranganUsahaBaruData();
        $this->json('POST', '/api/v1/keteranganUsahaBarus', $keteranganUsahaBaru);

        $this->assertApiResponse($keteranganUsahaBaru);
    }

    /**
     * @test
     */
    public function testReadKeteranganUsahaBaru()
    {
        $keteranganUsahaBaru = $this->makeKeteranganUsahaBaru();
        $this->json('GET', '/api/v1/keteranganUsahaBarus/'.$keteranganUsahaBaru->id);

        $this->assertApiResponse($keteranganUsahaBaru->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKeteranganUsahaBaru()
    {
        $keteranganUsahaBaru = $this->makeKeteranganUsahaBaru();
        $editedKeteranganUsahaBaru = $this->fakeKeteranganUsahaBaruData();

        $this->json('PUT', '/api/v1/keteranganUsahaBarus/'.$keteranganUsahaBaru->id, $editedKeteranganUsahaBaru);

        $this->assertApiResponse($editedKeteranganUsahaBaru);
    }

    /**
     * @test
     */
    public function testDeleteKeteranganUsahaBaru()
    {
        $keteranganUsahaBaru = $this->makeKeteranganUsahaBaru();
        $this->json('DELETE', '/api/v1/keteranganUsahaBarus/'.$keteranganUsahaBaru->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/keteranganUsahaBarus/'.$keteranganUsahaBaru->id);

        $this->assertResponseStatus(404);
    }
}
