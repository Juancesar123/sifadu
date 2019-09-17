<?php

use App\Models\PendudukMiskin;
use App\Repositories\PendudukMiskinRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PendudukMiskinRepositoryTest extends TestCase
{
    use MakePendudukMiskinTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PendudukMiskinRepository
     */
    protected $pendudukMiskinRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pendudukMiskinRepo = App::make(PendudukMiskinRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePendudukMiskin()
    {
        $pendudukMiskin = $this->fakePendudukMiskinData();
        $createdPendudukMiskin = $this->pendudukMiskinRepo->create($pendudukMiskin);
        $createdPendudukMiskin = $createdPendudukMiskin->toArray();
        $this->assertArrayHasKey('id', $createdPendudukMiskin);
        $this->assertNotNull($createdPendudukMiskin['id'], 'Created PendudukMiskin must have id specified');
        $this->assertNotNull(PendudukMiskin::find($createdPendudukMiskin['id']), 'PendudukMiskin with given id must be in DB');
        $this->assertModelData($pendudukMiskin, $createdPendudukMiskin);
    }

    /**
     * @test read
     */
    public function testReadPendudukMiskin()
    {
        $pendudukMiskin = $this->makePendudukMiskin();
        $dbPendudukMiskin = $this->pendudukMiskinRepo->find($pendudukMiskin->id);
        $dbPendudukMiskin = $dbPendudukMiskin->toArray();
        $this->assertModelData($pendudukMiskin->toArray(), $dbPendudukMiskin);
    }

    /**
     * @test update
     */
    public function testUpdatePendudukMiskin()
    {
        $pendudukMiskin = $this->makePendudukMiskin();
        $fakePendudukMiskin = $this->fakePendudukMiskinData();
        $updatedPendudukMiskin = $this->pendudukMiskinRepo->update($fakePendudukMiskin, $pendudukMiskin->id);
        $this->assertModelData($fakePendudukMiskin, $updatedPendudukMiskin->toArray());
        $dbPendudukMiskin = $this->pendudukMiskinRepo->find($pendudukMiskin->id);
        $this->assertModelData($fakePendudukMiskin, $dbPendudukMiskin->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePendudukMiskin()
    {
        $pendudukMiskin = $this->makePendudukMiskin();
        $resp = $this->pendudukMiskinRepo->delete($pendudukMiskin->id);
        $this->assertTrue($resp);
        $this->assertNull(PendudukMiskin::find($pendudukMiskin->id), 'PendudukMiskin should not exist in DB');
    }
}
