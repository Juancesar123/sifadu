<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class dusunApiTest extends TestCase
{
    use MakedusunTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedusun()
    {
        $dusun = $this->fakedusunData();
        $this->json('POST', '/api/v1/dusuns', $dusun);

        $this->assertApiResponse($dusun);
    }

    /**
     * @test
     */
    public function testReaddusun()
    {
        $dusun = $this->makedusun();
        $this->json('GET', '/api/v1/dusuns/'.$dusun->id);

        $this->assertApiResponse($dusun->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedusun()
    {
        $dusun = $this->makedusun();
        $editeddusun = $this->fakedusunData();

        $this->json('PUT', '/api/v1/dusuns/'.$dusun->id, $editeddusun);

        $this->assertApiResponse($editeddusun);
    }

    /**
     * @test
     */
    public function testDeletedusun()
    {
        $dusun = $this->makedusun();
        $this->json('DELETE', '/api/v1/dusuns/'.$dusun->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dusuns/'.$dusun->id);

        $this->assertResponseStatus(404);
    }
}
