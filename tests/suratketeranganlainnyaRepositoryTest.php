<?php

use App\Models\suratketeranganlainnya;
use App\Repositories\suratketeranganlainnyaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketeranganlainnyaRepositoryTest extends TestCase
{
    use MakesuratketeranganlainnyaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratketeranganlainnyaRepository
     */
    protected $suratketeranganlainnyaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratketeranganlainnyaRepo = App::make(suratketeranganlainnyaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratketeranganlainnya()
    {
        $suratketeranganlainnya = $this->fakesuratketeranganlainnyaData();
        $createdsuratketeranganlainnya = $this->suratketeranganlainnyaRepo->create($suratketeranganlainnya);
        $createdsuratketeranganlainnya = $createdsuratketeranganlainnya->toArray();
        $this->assertArrayHasKey('id', $createdsuratketeranganlainnya);
        $this->assertNotNull($createdsuratketeranganlainnya['id'], 'Created suratketeranganlainnya must have id specified');
        $this->assertNotNull(suratketeranganlainnya::find($createdsuratketeranganlainnya['id']), 'suratketeranganlainnya with given id must be in DB');
        $this->assertModelData($suratketeranganlainnya, $createdsuratketeranganlainnya);
    }

    /**
     * @test read
     */
    public function testReadsuratketeranganlainnya()
    {
        $suratketeranganlainnya = $this->makesuratketeranganlainnya();
        $dbsuratketeranganlainnya = $this->suratketeranganlainnyaRepo->find($suratketeranganlainnya->id);
        $dbsuratketeranganlainnya = $dbsuratketeranganlainnya->toArray();
        $this->assertModelData($suratketeranganlainnya->toArray(), $dbsuratketeranganlainnya);
    }

    /**
     * @test update
     */
    public function testUpdatesuratketeranganlainnya()
    {
        $suratketeranganlainnya = $this->makesuratketeranganlainnya();
        $fakesuratketeranganlainnya = $this->fakesuratketeranganlainnyaData();
        $updatedsuratketeranganlainnya = $this->suratketeranganlainnyaRepo->update($fakesuratketeranganlainnya, $suratketeranganlainnya->id);
        $this->assertModelData($fakesuratketeranganlainnya, $updatedsuratketeranganlainnya->toArray());
        $dbsuratketeranganlainnya = $this->suratketeranganlainnyaRepo->find($suratketeranganlainnya->id);
        $this->assertModelData($fakesuratketeranganlainnya, $dbsuratketeranganlainnya->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratketeranganlainnya()
    {
        $suratketeranganlainnya = $this->makesuratketeranganlainnya();
        $resp = $this->suratketeranganlainnyaRepo->delete($suratketeranganlainnya->id);
        $this->assertTrue($resp);
        $this->assertNull(suratketeranganlainnya::find($suratketeranganlainnya->id), 'suratketeranganlainnya should not exist in DB');
    }
}
