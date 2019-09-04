<?php

use App\Models\suratketerangandomisili;
use App\Repositories\suratketerangandomisiliRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketerangandomisiliRepositoryTest extends TestCase
{
    use MakesuratketerangandomisiliTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratketerangandomisiliRepository
     */
    protected $suratketerangandomisiliRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratketerangandomisiliRepo = App::make(suratketerangandomisiliRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratketerangandomisili()
    {
        $suratketerangandomisili = $this->fakesuratketerangandomisiliData();
        $createdsuratketerangandomisili = $this->suratketerangandomisiliRepo->create($suratketerangandomisili);
        $createdsuratketerangandomisili = $createdsuratketerangandomisili->toArray();
        $this->assertArrayHasKey('id', $createdsuratketerangandomisili);
        $this->assertNotNull($createdsuratketerangandomisili['id'], 'Created suratketerangandomisili must have id specified');
        $this->assertNotNull(suratketerangandomisili::find($createdsuratketerangandomisili['id']), 'suratketerangandomisili with given id must be in DB');
        $this->assertModelData($suratketerangandomisili, $createdsuratketerangandomisili);
    }

    /**
     * @test read
     */
    public function testReadsuratketerangandomisili()
    {
        $suratketerangandomisili = $this->makesuratketerangandomisili();
        $dbsuratketerangandomisili = $this->suratketerangandomisiliRepo->find($suratketerangandomisili->id);
        $dbsuratketerangandomisili = $dbsuratketerangandomisili->toArray();
        $this->assertModelData($suratketerangandomisili->toArray(), $dbsuratketerangandomisili);
    }

    /**
     * @test update
     */
    public function testUpdatesuratketerangandomisili()
    {
        $suratketerangandomisili = $this->makesuratketerangandomisili();
        $fakesuratketerangandomisili = $this->fakesuratketerangandomisiliData();
        $updatedsuratketerangandomisili = $this->suratketerangandomisiliRepo->update($fakesuratketerangandomisili, $suratketerangandomisili->id);
        $this->assertModelData($fakesuratketerangandomisili, $updatedsuratketerangandomisili->toArray());
        $dbsuratketerangandomisili = $this->suratketerangandomisiliRepo->find($suratketerangandomisili->id);
        $this->assertModelData($fakesuratketerangandomisili, $dbsuratketerangandomisili->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratketerangandomisili()
    {
        $suratketerangandomisili = $this->makesuratketerangandomisili();
        $resp = $this->suratketerangandomisiliRepo->delete($suratketerangandomisili->id);
        $this->assertTrue($resp);
        $this->assertNull(suratketerangandomisili::find($suratketerangandomisili->id), 'suratketerangandomisili should not exist in DB');
    }
}
