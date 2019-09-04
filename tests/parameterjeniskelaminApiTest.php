<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class parameterjeniskelaminApiTest extends TestCase
{
    use MakeparameterjeniskelaminTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateparameterjeniskelamin()
    {
        $parameterjeniskelamin = $this->fakeparameterjeniskelaminData();
        $this->json('POST', '/api/v1/parameterjeniskelamins', $parameterjeniskelamin);

        $this->assertApiResponse($parameterjeniskelamin);
    }

    /**
     * @test
     */
    public function testReadparameterjeniskelamin()
    {
        $parameterjeniskelamin = $this->makeparameterjeniskelamin();
        $this->json('GET', '/api/v1/parameterjeniskelamins/'.$parameterjeniskelamin->id);

        $this->assertApiResponse($parameterjeniskelamin->toArray());
    }

    /**
     * @test
     */
    public function testUpdateparameterjeniskelamin()
    {
        $parameterjeniskelamin = $this->makeparameterjeniskelamin();
        $editedparameterjeniskelamin = $this->fakeparameterjeniskelaminData();

        $this->json('PUT', '/api/v1/parameterjeniskelamins/'.$parameterjeniskelamin->id, $editedparameterjeniskelamin);

        $this->assertApiResponse($editedparameterjeniskelamin);
    }

    /**
     * @test
     */
    public function testDeleteparameterjeniskelamin()
    {
        $parameterjeniskelamin = $this->makeparameterjeniskelamin();
        $this->json('DELETE', '/api/v1/parameterjeniskelamins/'.$parameterjeniskelamin->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/parameterjeniskelamins/'.$parameterjeniskelamin->id);

        $this->assertResponseStatus(404);
    }
}
