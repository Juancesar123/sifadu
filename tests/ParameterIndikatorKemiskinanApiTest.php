<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParameterIndikatorKemiskinanApiTest extends TestCase
{
    use MakeParameterIndikatorKemiskinanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateParameterIndikatorKemiskinan()
    {
        $parameterIndikatorKemiskinan = $this->fakeParameterIndikatorKemiskinanData();
        $this->json('POST', '/api/v1/parameterIndikatorKemiskinans', $parameterIndikatorKemiskinan);

        $this->assertApiResponse($parameterIndikatorKemiskinan);
    }

    /**
     * @test
     */
    public function testReadParameterIndikatorKemiskinan()
    {
        $parameterIndikatorKemiskinan = $this->makeParameterIndikatorKemiskinan();
        $this->json('GET', '/api/v1/parameterIndikatorKemiskinans/'.$parameterIndikatorKemiskinan->id);

        $this->assertApiResponse($parameterIndikatorKemiskinan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateParameterIndikatorKemiskinan()
    {
        $parameterIndikatorKemiskinan = $this->makeParameterIndikatorKemiskinan();
        $editedParameterIndikatorKemiskinan = $this->fakeParameterIndikatorKemiskinanData();

        $this->json('PUT', '/api/v1/parameterIndikatorKemiskinans/'.$parameterIndikatorKemiskinan->id, $editedParameterIndikatorKemiskinan);

        $this->assertApiResponse($editedParameterIndikatorKemiskinan);
    }

    /**
     * @test
     */
    public function testDeleteParameterIndikatorKemiskinan()
    {
        $parameterIndikatorKemiskinan = $this->makeParameterIndikatorKemiskinan();
        $this->json('DELETE', '/api/v1/parameterIndikatorKemiskinans/'.$parameterIndikatorKemiskinan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/parameterIndikatorKemiskinans/'.$parameterIndikatorKemiskinan->id);

        $this->assertResponseStatus(404);
    }
}
