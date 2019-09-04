<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class kaderpembangunanApiTest extends TestCase
{
    use MakekaderpembangunanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatekaderpembangunan()
    {
        $kaderpembangunan = $this->fakekaderpembangunanData();
        $this->json('POST', '/api/v1/kaderpembangunans', $kaderpembangunan);

        $this->assertApiResponse($kaderpembangunan);
    }

    /**
     * @test
     */
    public function testReadkaderpembangunan()
    {
        $kaderpembangunan = $this->makekaderpembangunan();
        $this->json('GET', '/api/v1/kaderpembangunans/'.$kaderpembangunan->id);

        $this->assertApiResponse($kaderpembangunan->toArray());
    }

    /**
     * @test
     */
    public function testUpdatekaderpembangunan()
    {
        $kaderpembangunan = $this->makekaderpembangunan();
        $editedkaderpembangunan = $this->fakekaderpembangunanData();

        $this->json('PUT', '/api/v1/kaderpembangunans/'.$kaderpembangunan->id, $editedkaderpembangunan);

        $this->assertApiResponse($editedkaderpembangunan);
    }

    /**
     * @test
     */
    public function testDeletekaderpembangunan()
    {
        $kaderpembangunan = $this->makekaderpembangunan();
        $this->json('DELETE', '/api/v1/kaderpembangunans/'.$kaderpembangunan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kaderpembangunans/'.$kaderpembangunan->id);

        $this->assertResponseStatus(404);
    }
}
