<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pajaktanahApiTest extends TestCase
{
    use MakepajaktanahTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatepajaktanah()
    {
        $pajaktanah = $this->fakepajaktanahData();
        $this->json('POST', '/api/v1/pajaktanahs', $pajaktanah);

        $this->assertApiResponse($pajaktanah);
    }

    /**
     * @test
     */
    public function testReadpajaktanah()
    {
        $pajaktanah = $this->makepajaktanah();
        $this->json('GET', '/api/v1/pajaktanahs/'.$pajaktanah->id);

        $this->assertApiResponse($pajaktanah->toArray());
    }

    /**
     * @test
     */
    public function testUpdatepajaktanah()
    {
        $pajaktanah = $this->makepajaktanah();
        $editedpajaktanah = $this->fakepajaktanahData();

        $this->json('PUT', '/api/v1/pajaktanahs/'.$pajaktanah->id, $editedpajaktanah);

        $this->assertApiResponse($editedpajaktanah);
    }

    /**
     * @test
     */
    public function testDeletepajaktanah()
    {
        $pajaktanah = $this->makepajaktanah();
        $this->json('DELETE', '/api/v1/pajaktanahs/'.$pajaktanah->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pajaktanahs/'.$pajaktanah->id);

        $this->assertResponseStatus(404);
    }
}
