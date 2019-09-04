<?php

use App\Models\suratketerangandesa;
use App\Repositories\suratketerangandesaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketerangandesaRepositoryTest extends TestCase
{
    use MakesuratketerangandesaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratketerangandesaRepository
     */
    protected $suratketerangandesaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratketerangandesaRepo = App::make(suratketerangandesaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratketerangandesa()
    {
        $suratketerangandesa = $this->fakesuratketerangandesaData();
        $createdsuratketerangandesa = $this->suratketerangandesaRepo->create($suratketerangandesa);
        $createdsuratketerangandesa = $createdsuratketerangandesa->toArray();
        $this->assertArrayHasKey('id', $createdsuratketerangandesa);
        $this->assertNotNull($createdsuratketerangandesa['id'], 'Created suratketerangandesa must have id specified');
        $this->assertNotNull(suratketerangandesa::find($createdsuratketerangandesa['id']), 'suratketerangandesa with given id must be in DB');
        $this->assertModelData($suratketerangandesa, $createdsuratketerangandesa);
    }

    /**
     * @test read
     */
    public function testReadsuratketerangandesa()
    {
        $suratketerangandesa = $this->makesuratketerangandesa();
        $dbsuratketerangandesa = $this->suratketerangandesaRepo->find($suratketerangandesa->id);
        $dbsuratketerangandesa = $dbsuratketerangandesa->toArray();
        $this->assertModelData($suratketerangandesa->toArray(), $dbsuratketerangandesa);
    }

    /**
     * @test update
     */
    public function testUpdatesuratketerangandesa()
    {
        $suratketerangandesa = $this->makesuratketerangandesa();
        $fakesuratketerangandesa = $this->fakesuratketerangandesaData();
        $updatedsuratketerangandesa = $this->suratketerangandesaRepo->update($fakesuratketerangandesa, $suratketerangandesa->id);
        $this->assertModelData($fakesuratketerangandesa, $updatedsuratketerangandesa->toArray());
        $dbsuratketerangandesa = $this->suratketerangandesaRepo->find($suratketerangandesa->id);
        $this->assertModelData($fakesuratketerangandesa, $dbsuratketerangandesa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratketerangandesa()
    {
        $suratketerangandesa = $this->makesuratketerangandesa();
        $resp = $this->suratketerangandesaRepo->delete($suratketerangandesa->id);
        $this->assertTrue($resp);
        $this->assertNull(suratketerangandesa::find($suratketerangandesa->id), 'suratketerangandesa should not exist in DB');
    }
}
