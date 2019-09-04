<?php

use App\Models\inventarisproyek;
use App\Repositories\inventarisproyekRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class inventarisproyekRepositoryTest extends TestCase
{
    use MakeinventarisproyekTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var inventarisproyekRepository
     */
    protected $inventarisproyekRepo;

    public function setUp()
    {
        parent::setUp();
        $this->inventarisproyekRepo = App::make(inventarisproyekRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateinventarisproyek()
    {
        $inventarisproyek = $this->fakeinventarisproyekData();
        $createdinventarisproyek = $this->inventarisproyekRepo->create($inventarisproyek);
        $createdinventarisproyek = $createdinventarisproyek->toArray();
        $this->assertArrayHasKey('id', $createdinventarisproyek);
        $this->assertNotNull($createdinventarisproyek['id'], 'Created inventarisproyek must have id specified');
        $this->assertNotNull(inventarisproyek::find($createdinventarisproyek['id']), 'inventarisproyek with given id must be in DB');
        $this->assertModelData($inventarisproyek, $createdinventarisproyek);
    }

    /**
     * @test read
     */
    public function testReadinventarisproyek()
    {
        $inventarisproyek = $this->makeinventarisproyek();
        $dbinventarisproyek = $this->inventarisproyekRepo->find($inventarisproyek->id);
        $dbinventarisproyek = $dbinventarisproyek->toArray();
        $this->assertModelData($inventarisproyek->toArray(), $dbinventarisproyek);
    }

    /**
     * @test update
     */
    public function testUpdateinventarisproyek()
    {
        $inventarisproyek = $this->makeinventarisproyek();
        $fakeinventarisproyek = $this->fakeinventarisproyekData();
        $updatedinventarisproyek = $this->inventarisproyekRepo->update($fakeinventarisproyek, $inventarisproyek->id);
        $this->assertModelData($fakeinventarisproyek, $updatedinventarisproyek->toArray());
        $dbinventarisproyek = $this->inventarisproyekRepo->find($inventarisproyek->id);
        $this->assertModelData($fakeinventarisproyek, $dbinventarisproyek->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteinventarisproyek()
    {
        $inventarisproyek = $this->makeinventarisproyek();
        $resp = $this->inventarisproyekRepo->delete($inventarisproyek->id);
        $this->assertTrue($resp);
        $this->assertNull(inventarisproyek::find($inventarisproyek->id), 'inventarisproyek should not exist in DB');
    }
}
