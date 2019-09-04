<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class kegiatanpembangunanApiTest extends TestCase
{
    use MakekegiatanpembangunanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatekegiatanpembangunan()
    {
        $kegiatanpembangunan = $this->fakekegiatanpembangunanData();
        $this->json('POST', '/api/v1/kegiatanpembangunans', $kegiatanpembangunan);

        $this->assertApiResponse($kegiatanpembangunan);
    }

    /**
     * @test
     */
    public function testReadkegiatanpembangunan()
    {
        $kegiatanpembangunan = $this->makekegiatanpembangunan();
        $this->json('GET', '/api/v1/kegiatanpembangunans/'.$kegiatanpembangunan->id);

        $this->assertApiResponse($kegiatanpembangunan->toArray());
    }

    /**
     * @test
     */
    public function testUpdatekegiatanpembangunan()
    {
        $kegiatanpembangunan = $this->makekegiatanpembangunan();
        $editedkegiatanpembangunan = $this->fakekegiatanpembangunanData();

        $this->json('PUT', '/api/v1/kegiatanpembangunans/'.$kegiatanpembangunan->id, $editedkegiatanpembangunan);

        $this->assertApiResponse($editedkegiatanpembangunan);
    }

    /**
     * @test
     */
    public function testDeletekegiatanpembangunan()
    {
        $kegiatanpembangunan = $this->makekegiatanpembangunan();
        $this->json('DELETE', '/api/v1/kegiatanpembangunans/'.$kegiatanpembangunan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kegiatanpembangunans/'.$kegiatanpembangunan->id);

        $this->assertResponseStatus(404);
    }
}
