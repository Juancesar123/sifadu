<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class rencanapembangunanApiTest extends TestCase
{
    use MakerencanapembangunanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreaterencanapembangunan()
    {
        $rencanapembangunan = $this->fakerencanapembangunanData();
        $this->json('POST', '/api/v1/rencanapembangunans', $rencanapembangunan);

        $this->assertApiResponse($rencanapembangunan);
    }

    /**
     * @test
     */
    public function testReadrencanapembangunan()
    {
        $rencanapembangunan = $this->makerencanapembangunan();
        $this->json('GET', '/api/v1/rencanapembangunans/'.$rencanapembangunan->id);

        $this->assertApiResponse($rencanapembangunan->toArray());
    }

    /**
     * @test
     */
    public function testUpdaterencanapembangunan()
    {
        $rencanapembangunan = $this->makerencanapembangunan();
        $editedrencanapembangunan = $this->fakerencanapembangunanData();

        $this->json('PUT', '/api/v1/rencanapembangunans/'.$rencanapembangunan->id, $editedrencanapembangunan);

        $this->assertApiResponse($editedrencanapembangunan);
    }

    /**
     * @test
     */
    public function testDeleterencanapembangunan()
    {
        $rencanapembangunan = $this->makerencanapembangunan();
        $this->json('DELETE', '/api/v1/rencanapembangunans/'.$rencanapembangunan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/rencanapembangunans/'.$rencanapembangunan->id);

        $this->assertResponseStatus(404);
    }
}
