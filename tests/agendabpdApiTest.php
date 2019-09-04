<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class agendabpdApiTest extends TestCase
{
    use MakeagendabpdTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateagendabpd()
    {
        $agendabpd = $this->fakeagendabpdData();
        $this->json('POST', '/api/v1/agendabpds', $agendabpd);

        $this->assertApiResponse($agendabpd);
    }

    /**
     * @test
     */
    public function testReadagendabpd()
    {
        $agendabpd = $this->makeagendabpd();
        $this->json('GET', '/api/v1/agendabpds/'.$agendabpd->id);

        $this->assertApiResponse($agendabpd->toArray());
    }

    /**
     * @test
     */
    public function testUpdateagendabpd()
    {
        $agendabpd = $this->makeagendabpd();
        $editedagendabpd = $this->fakeagendabpdData();

        $this->json('PUT', '/api/v1/agendabpds/'.$agendabpd->id, $editedagendabpd);

        $this->assertApiResponse($editedagendabpd);
    }

    /**
     * @test
     */
    public function testDeleteagendabpd()
    {
        $agendabpd = $this->makeagendabpd();
        $this->json('DELETE', '/api/v1/agendabpds/'.$agendabpd->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/agendabpds/'.$agendabpd->id);

        $this->assertResponseStatus(404);
    }
}
