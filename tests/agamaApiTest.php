<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class agamaApiTest extends TestCase
{
    use MakeagamaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateagama()
    {
        $agama = $this->fakeagamaData();
        $this->json('POST', '/api/v1/agamas', $agama);

        $this->assertApiResponse($agama);
    }

    /**
     * @test
     */
    public function testReadagama()
    {
        $agama = $this->makeagama();
        $this->json('GET', '/api/v1/agamas/'.$agama->id);

        $this->assertApiResponse($agama->toArray());
    }

    /**
     * @test
     */
    public function testUpdateagama()
    {
        $agama = $this->makeagama();
        $editedagama = $this->fakeagamaData();

        $this->json('PUT', '/api/v1/agamas/'.$agama->id, $editedagama);

        $this->assertApiResponse($editedagama);
    }

    /**
     * @test
     */
    public function testDeleteagama()
    {
        $agama = $this->makeagama();
        $this->json('DELETE', '/api/v1/agamas/'.$agama->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/agamas/'.$agama->id);

        $this->assertResponseStatus(404);
    }
}
