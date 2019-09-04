<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class inventarisproyekApiTest extends TestCase
{
    use MakeinventarisproyekTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateinventarisproyek()
    {
        $inventarisproyek = $this->fakeinventarisproyekData();
        $this->json('POST', '/api/v1/inventarisproyeks', $inventarisproyek);

        $this->assertApiResponse($inventarisproyek);
    }

    /**
     * @test
     */
    public function testReadinventarisproyek()
    {
        $inventarisproyek = $this->makeinventarisproyek();
        $this->json('GET', '/api/v1/inventarisproyeks/'.$inventarisproyek->id);

        $this->assertApiResponse($inventarisproyek->toArray());
    }

    /**
     * @test
     */
    public function testUpdateinventarisproyek()
    {
        $inventarisproyek = $this->makeinventarisproyek();
        $editedinventarisproyek = $this->fakeinventarisproyekData();

        $this->json('PUT', '/api/v1/inventarisproyeks/'.$inventarisproyek->id, $editedinventarisproyek);

        $this->assertApiResponse($editedinventarisproyek);
    }

    /**
     * @test
     */
    public function testDeleteinventarisproyek()
    {
        $inventarisproyek = $this->makeinventarisproyek();
        $this->json('DELETE', '/api/v1/inventarisproyeks/'.$inventarisproyek->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/inventarisproyeks/'.$inventarisproyek->id);

        $this->assertResponseStatus(404);
    }
}
