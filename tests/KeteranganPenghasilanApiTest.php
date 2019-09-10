<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeteranganPenghasilanApiTest extends TestCase
{
    use MakeKeteranganPenghasilanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKeteranganPenghasilan()
    {
        $keteranganPenghasilan = $this->fakeKeteranganPenghasilanData();
        $this->json('POST', '/api/v1/keteranganPenghasilans', $keteranganPenghasilan);

        $this->assertApiResponse($keteranganPenghasilan);
    }

    /**
     * @test
     */
    public function testReadKeteranganPenghasilan()
    {
        $keteranganPenghasilan = $this->makeKeteranganPenghasilan();
        $this->json('GET', '/api/v1/keteranganPenghasilans/'.$keteranganPenghasilan->id);

        $this->assertApiResponse($keteranganPenghasilan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKeteranganPenghasilan()
    {
        $keteranganPenghasilan = $this->makeKeteranganPenghasilan();
        $editedKeteranganPenghasilan = $this->fakeKeteranganPenghasilanData();

        $this->json('PUT', '/api/v1/keteranganPenghasilans/'.$keteranganPenghasilan->id, $editedKeteranganPenghasilan);

        $this->assertApiResponse($editedKeteranganPenghasilan);
    }

    /**
     * @test
     */
    public function testDeleteKeteranganPenghasilan()
    {
        $keteranganPenghasilan = $this->makeKeteranganPenghasilan();
        $this->json('DELETE', '/api/v1/keteranganPenghasilans/'.$keteranganPenghasilan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/keteranganPenghasilans/'.$keteranganPenghasilan->id);

        $this->assertResponseStatus(404);
    }
}
