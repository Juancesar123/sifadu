<?php

use App\Models\suratketeranganusaha;
use App\Repositories\suratketeranganusahaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketeranganusahaRepositoryTest extends TestCase
{
    use MakesuratketeranganusahaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratketeranganusahaRepository
     */
    protected $suratketeranganusahaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratketeranganusahaRepo = App::make(suratketeranganusahaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratketeranganusaha()
    {
        $suratketeranganusaha = $this->fakesuratketeranganusahaData();
        $createdsuratketeranganusaha = $this->suratketeranganusahaRepo->create($suratketeranganusaha);
        $createdsuratketeranganusaha = $createdsuratketeranganusaha->toArray();
        $this->assertArrayHasKey('id', $createdsuratketeranganusaha);
        $this->assertNotNull($createdsuratketeranganusaha['id'], 'Created suratketeranganusaha must have id specified');
        $this->assertNotNull(suratketeranganusaha::find($createdsuratketeranganusaha['id']), 'suratketeranganusaha with given id must be in DB');
        $this->assertModelData($suratketeranganusaha, $createdsuratketeranganusaha);
    }

    /**
     * @test read
     */
    public function testReadsuratketeranganusaha()
    {
        $suratketeranganusaha = $this->makesuratketeranganusaha();
        $dbsuratketeranganusaha = $this->suratketeranganusahaRepo->find($suratketeranganusaha->id);
        $dbsuratketeranganusaha = $dbsuratketeranganusaha->toArray();
        $this->assertModelData($suratketeranganusaha->toArray(), $dbsuratketeranganusaha);
    }

    /**
     * @test update
     */
    public function testUpdatesuratketeranganusaha()
    {
        $suratketeranganusaha = $this->makesuratketeranganusaha();
        $fakesuratketeranganusaha = $this->fakesuratketeranganusahaData();
        $updatedsuratketeranganusaha = $this->suratketeranganusahaRepo->update($fakesuratketeranganusaha, $suratketeranganusaha->id);
        $this->assertModelData($fakesuratketeranganusaha, $updatedsuratketeranganusaha->toArray());
        $dbsuratketeranganusaha = $this->suratketeranganusahaRepo->find($suratketeranganusaha->id);
        $this->assertModelData($fakesuratketeranganusaha, $dbsuratketeranganusaha->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratketeranganusaha()
    {
        $suratketeranganusaha = $this->makesuratketeranganusaha();
        $resp = $this->suratketeranganusahaRepo->delete($suratketeranganusaha->id);
        $this->assertTrue($resp);
        $this->assertNull(suratketeranganusaha::find($suratketeranganusaha->id), 'suratketeranganusaha should not exist in DB');
    }
}
