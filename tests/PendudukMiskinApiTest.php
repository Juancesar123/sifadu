<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PendudukMiskinApiTest extends TestCase
{
    use MakePendudukMiskinTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePendudukMiskin()
    {
        $pendudukMiskin = $this->fakePendudukMiskinData();
        $this->json('POST', '/api/v1/kemiskinan', $pendudukMiskin);

        $this->assertApiResponse($pendudukMiskin);
    }

    /**
     * @test
     */
    public function testReadPendudukMiskin()
    {
        $pendudukMiskin = $this->makePendudukMiskin();
        $this->json('GET', '/api/v1/kemiskinan/'.$pendudukMiskin->id);

        $this->assertApiResponse($pendudukMiskin->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePendudukMiskin()
    {
        $pendudukMiskin = $this->makePendudukMiskin();
        $editedPendudukMiskin = $this->fakePendudukMiskinData();

        $this->json('PUT', '/api/v1/kemiskinan/'.$pendudukMiskin->id, $editedPendudukMiskin);

        $this->assertApiResponse($editedPendudukMiskin);
    }

    /**
     * @test
     */
    public function testDeletePendudukMiskin()
    {
        $pendudukMiskin = $this->makePendudukMiskin();
        $this->json('DELETE', '/api/v1/kemiskinan/'.$pendudukMiskin->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kemiskinan/'.$pendudukMiskin->id);

        $this->assertResponseStatus(404);
    }
}