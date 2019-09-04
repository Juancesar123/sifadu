<?php

use App\Models\suratketeranganpenguasaantanah;
use App\Repositories\suratketeranganpenguasaantanahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketeranganpenguasaantanahRepositoryTest extends TestCase
{
    use MakesuratketeranganpenguasaantanahTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratketeranganpenguasaantanahRepository
     */
    protected $suratketeranganpenguasaantanahRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratketeranganpenguasaantanahRepo = App::make(suratketeranganpenguasaantanahRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratketeranganpenguasaantanah()
    {
        $suratketeranganpenguasaantanah = $this->fakesuratketeranganpenguasaantanahData();
        $createdsuratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepo->create($suratketeranganpenguasaantanah);
        $createdsuratketeranganpenguasaantanah = $createdsuratketeranganpenguasaantanah->toArray();
        $this->assertArrayHasKey('id', $createdsuratketeranganpenguasaantanah);
        $this->assertNotNull($createdsuratketeranganpenguasaantanah['id'], 'Created suratketeranganpenguasaantanah must have id specified');
        $this->assertNotNull(suratketeranganpenguasaantanah::find($createdsuratketeranganpenguasaantanah['id']), 'suratketeranganpenguasaantanah with given id must be in DB');
        $this->assertModelData($suratketeranganpenguasaantanah, $createdsuratketeranganpenguasaantanah);
    }

    /**
     * @test read
     */
    public function testReadsuratketeranganpenguasaantanah()
    {
        $suratketeranganpenguasaantanah = $this->makesuratketeranganpenguasaantanah();
        $dbsuratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepo->find($suratketeranganpenguasaantanah->id);
        $dbsuratketeranganpenguasaantanah = $dbsuratketeranganpenguasaantanah->toArray();
        $this->assertModelData($suratketeranganpenguasaantanah->toArray(), $dbsuratketeranganpenguasaantanah);
    }

    /**
     * @test update
     */
    public function testUpdatesuratketeranganpenguasaantanah()
    {
        $suratketeranganpenguasaantanah = $this->makesuratketeranganpenguasaantanah();
        $fakesuratketeranganpenguasaantanah = $this->fakesuratketeranganpenguasaantanahData();
        $updatedsuratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepo->update($fakesuratketeranganpenguasaantanah, $suratketeranganpenguasaantanah->id);
        $this->assertModelData($fakesuratketeranganpenguasaantanah, $updatedsuratketeranganpenguasaantanah->toArray());
        $dbsuratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepo->find($suratketeranganpenguasaantanah->id);
        $this->assertModelData($fakesuratketeranganpenguasaantanah, $dbsuratketeranganpenguasaantanah->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratketeranganpenguasaantanah()
    {
        $suratketeranganpenguasaantanah = $this->makesuratketeranganpenguasaantanah();
        $resp = $this->suratketeranganpenguasaantanahRepo->delete($suratketeranganpenguasaantanah->id);
        $this->assertTrue($resp);
        $this->assertNull(suratketeranganpenguasaantanah::find($suratketeranganpenguasaantanah->id), 'suratketeranganpenguasaantanah should not exist in DB');
    }
}
