<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pendidikanApiTest extends TestCase
{
    use MakependidikanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatependidikan()
    {
        $pendidikan = $this->fakependidikanData();
        $this->json('POST', '/api/v1/pendidikans', $pendidikan);

        $this->assertApiResponse($pendidikan);
    }

    /**
     * @test
     */
    public function testReadpendidikan()
    {
        $pendidikan = $this->makependidikan();
        $this->json('GET', '/api/v1/pendidikans/'.$pendidikan->id);

        $this->assertApiResponse($pendidikan->toArray());
    }

    /**
     * @test
     */
    public function testUpdatependidikan()
    {
        $pendidikan = $this->makependidikan();
        $editedpendidikan = $this->fakependidikanData();

        $this->json('PUT', '/api/v1/pendidikans/'.$pendidikan->id, $editedpendidikan);

        $this->assertApiResponse($editedpendidikan);
    }

    /**
     * @test
     */
    public function testDeletependidikan()
    {
        $pendidikan = $this->makependidikan();
        $this->json('DELETE', '/api/v1/pendidikans/'.$pendidikan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pendidikans/'.$pendidikan->id);

        $this->assertResponseStatus(404);
    }
}
