<?php

use App\Models\suratketerangantidakmampu;
use App\Repositories\suratketerangantidakmampuRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketerangantidakmampuRepositoryTest extends TestCase
{
    use MakesuratketerangantidakmampuTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratketerangantidakmampuRepository
     */
    protected $suratketerangantidakmampuRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratketerangantidakmampuRepo = App::make(suratketerangantidakmampuRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratketerangantidakmampu()
    {
        $suratketerangantidakmampu = $this->fakesuratketerangantidakmampuData();
        $createdsuratketerangantidakmampu = $this->suratketerangantidakmampuRepo->create($suratketerangantidakmampu);
        $createdsuratketerangantidakmampu = $createdsuratketerangantidakmampu->toArray();
        $this->assertArrayHasKey('id', $createdsuratketerangantidakmampu);
        $this->assertNotNull($createdsuratketerangantidakmampu['id'], 'Created suratketerangantidakmampu must have id specified');
        $this->assertNotNull(suratketerangantidakmampu::find($createdsuratketerangantidakmampu['id']), 'suratketerangantidakmampu with given id must be in DB');
        $this->assertModelData($suratketerangantidakmampu, $createdsuratketerangantidakmampu);
    }

    /**
     * @test read
     */
    public function testReadsuratketerangantidakmampu()
    {
        $suratketerangantidakmampu = $this->makesuratketerangantidakmampu();
        $dbsuratketerangantidakmampu = $this->suratketerangantidakmampuRepo->find($suratketerangantidakmampu->id);
        $dbsuratketerangantidakmampu = $dbsuratketerangantidakmampu->toArray();
        $this->assertModelData($suratketerangantidakmampu->toArray(), $dbsuratketerangantidakmampu);
    }

    /**
     * @test update
     */
    public function testUpdatesuratketerangantidakmampu()
    {
        $suratketerangantidakmampu = $this->makesuratketerangantidakmampu();
        $fakesuratketerangantidakmampu = $this->fakesuratketerangantidakmampuData();
        $updatedsuratketerangantidakmampu = $this->suratketerangantidakmampuRepo->update($fakesuratketerangantidakmampu, $suratketerangantidakmampu->id);
        $this->assertModelData($fakesuratketerangantidakmampu, $updatedsuratketerangantidakmampu->toArray());
        $dbsuratketerangantidakmampu = $this->suratketerangantidakmampuRepo->find($suratketerangantidakmampu->id);
        $this->assertModelData($fakesuratketerangantidakmampu, $dbsuratketerangantidakmampu->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratketerangantidakmampu()
    {
        $suratketerangantidakmampu = $this->makesuratketerangantidakmampu();
        $resp = $this->suratketerangantidakmampuRepo->delete($suratketerangantidakmampu->id);
        $this->assertTrue($resp);
        $this->assertNull(suratketerangantidakmampu::find($suratketerangantidakmampu->id), 'suratketerangantidakmampu should not exist in DB');
    }
}
