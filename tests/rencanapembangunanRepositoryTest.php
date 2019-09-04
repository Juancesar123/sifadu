<?php

use App\Models\rencanapembangunan;
use App\Repositories\rencanapembangunanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class rencanapembangunanRepositoryTest extends TestCase
{
    use MakerencanapembangunanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var rencanapembangunanRepository
     */
    protected $rencanapembangunanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->rencanapembangunanRepo = App::make(rencanapembangunanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreaterencanapembangunan()
    {
        $rencanapembangunan = $this->fakerencanapembangunanData();
        $createdrencanapembangunan = $this->rencanapembangunanRepo->create($rencanapembangunan);
        $createdrencanapembangunan = $createdrencanapembangunan->toArray();
        $this->assertArrayHasKey('id', $createdrencanapembangunan);
        $this->assertNotNull($createdrencanapembangunan['id'], 'Created rencanapembangunan must have id specified');
        $this->assertNotNull(rencanapembangunan::find($createdrencanapembangunan['id']), 'rencanapembangunan with given id must be in DB');
        $this->assertModelData($rencanapembangunan, $createdrencanapembangunan);
    }

    /**
     * @test read
     */
    public function testReadrencanapembangunan()
    {
        $rencanapembangunan = $this->makerencanapembangunan();
        $dbrencanapembangunan = $this->rencanapembangunanRepo->find($rencanapembangunan->id);
        $dbrencanapembangunan = $dbrencanapembangunan->toArray();
        $this->assertModelData($rencanapembangunan->toArray(), $dbrencanapembangunan);
    }

    /**
     * @test update
     */
    public function testUpdaterencanapembangunan()
    {
        $rencanapembangunan = $this->makerencanapembangunan();
        $fakerencanapembangunan = $this->fakerencanapembangunanData();
        $updatedrencanapembangunan = $this->rencanapembangunanRepo->update($fakerencanapembangunan, $rencanapembangunan->id);
        $this->assertModelData($fakerencanapembangunan, $updatedrencanapembangunan->toArray());
        $dbrencanapembangunan = $this->rencanapembangunanRepo->find($rencanapembangunan->id);
        $this->assertModelData($fakerencanapembangunan, $dbrencanapembangunan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleterencanapembangunan()
    {
        $rencanapembangunan = $this->makerencanapembangunan();
        $resp = $this->rencanapembangunanRepo->delete($rencanapembangunan->id);
        $this->assertTrue($resp);
        $this->assertNull(rencanapembangunan::find($rencanapembangunan->id), 'rencanapembangunan should not exist in DB');
    }
}
