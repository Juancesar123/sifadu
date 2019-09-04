<?php

use App\Models\suratketeranganskck;
use App\Repositories\suratketeranganskckRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratketeranganskckRepositoryTest extends TestCase
{
    use MakesuratketeranganskckTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratketeranganskckRepository
     */
    protected $suratketeranganskckRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratketeranganskckRepo = App::make(suratketeranganskckRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratketeranganskck()
    {
        $suratketeranganskck = $this->fakesuratketeranganskckData();
        $createdsuratketeranganskck = $this->suratketeranganskckRepo->create($suratketeranganskck);
        $createdsuratketeranganskck = $createdsuratketeranganskck->toArray();
        $this->assertArrayHasKey('id', $createdsuratketeranganskck);
        $this->assertNotNull($createdsuratketeranganskck['id'], 'Created suratketeranganskck must have id specified');
        $this->assertNotNull(suratketeranganskck::find($createdsuratketeranganskck['id']), 'suratketeranganskck with given id must be in DB');
        $this->assertModelData($suratketeranganskck, $createdsuratketeranganskck);
    }

    /**
     * @test read
     */
    public function testReadsuratketeranganskck()
    {
        $suratketeranganskck = $this->makesuratketeranganskck();
        $dbsuratketeranganskck = $this->suratketeranganskckRepo->find($suratketeranganskck->id);
        $dbsuratketeranganskck = $dbsuratketeranganskck->toArray();
        $this->assertModelData($suratketeranganskck->toArray(), $dbsuratketeranganskck);
    }

    /**
     * @test update
     */
    public function testUpdatesuratketeranganskck()
    {
        $suratketeranganskck = $this->makesuratketeranganskck();
        $fakesuratketeranganskck = $this->fakesuratketeranganskckData();
        $updatedsuratketeranganskck = $this->suratketeranganskckRepo->update($fakesuratketeranganskck, $suratketeranganskck->id);
        $this->assertModelData($fakesuratketeranganskck, $updatedsuratketeranganskck->toArray());
        $dbsuratketeranganskck = $this->suratketeranganskckRepo->find($suratketeranganskck->id);
        $this->assertModelData($fakesuratketeranganskck, $dbsuratketeranganskck->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratketeranganskck()
    {
        $suratketeranganskck = $this->makesuratketeranganskck();
        $resp = $this->suratketeranganskckRepo->delete($suratketeranganskck->id);
        $this->assertTrue($resp);
        $this->assertNull(suratketeranganskck::find($suratketeranganskck->id), 'suratketeranganskck should not exist in DB');
    }
}
