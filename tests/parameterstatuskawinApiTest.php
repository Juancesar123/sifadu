<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class parameterstatuskawinApiTest extends TestCase
{
    use MakeparameterstatuskawinTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateparameterstatuskawin()
    {
        $parameterstatuskawin = $this->fakeparameterstatuskawinData();
        $this->json('POST', '/api/v1/parameterstatuskawins', $parameterstatuskawin);

        $this->assertApiResponse($parameterstatuskawin);
    }

    /**
     * @test
     */
    public function testReadparameterstatuskawin()
    {
        $parameterstatuskawin = $this->makeparameterstatuskawin();
        $this->json('GET', '/api/v1/parameterstatuskawins/'.$parameterstatuskawin->id);

        $this->assertApiResponse($parameterstatuskawin->toArray());
    }

    /**
     * @test
     */
    public function testUpdateparameterstatuskawin()
    {
        $parameterstatuskawin = $this->makeparameterstatuskawin();
        $editedparameterstatuskawin = $this->fakeparameterstatuskawinData();

        $this->json('PUT', '/api/v1/parameterstatuskawins/'.$parameterstatuskawin->id, $editedparameterstatuskawin);

        $this->assertApiResponse($editedparameterstatuskawin);
    }

    /**
     * @test
     */
    public function testDeleteparameterstatuskawin()
    {
        $parameterstatuskawin = $this->makeparameterstatuskawin();
        $this->json('DELETE', '/api/v1/parameterstatuskawins/'.$parameterstatuskawin->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/parameterstatuskawins/'.$parameterstatuskawin->id);

        $this->assertResponseStatus(404);
    }
}
