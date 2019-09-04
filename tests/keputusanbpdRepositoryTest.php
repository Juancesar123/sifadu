<?php

use App\Models\keputusanbpd;
use App\Repositories\keputusanbpdRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class keputusanbpdRepositoryTest extends TestCase
{
    use MakekeputusanbpdTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var keputusanbpdRepository
     */
    protected $keputusanbpdRepo;

    public function setUp()
    {
        parent::setUp();
        $this->keputusanbpdRepo = App::make(keputusanbpdRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatekeputusanbpd()
    {
        $keputusanbpd = $this->fakekeputusanbpdData();
        $createdkeputusanbpd = $this->keputusanbpdRepo->create($keputusanbpd);
        $createdkeputusanbpd = $createdkeputusanbpd->toArray();
        $this->assertArrayHasKey('id', $createdkeputusanbpd);
        $this->assertNotNull($createdkeputusanbpd['id'], 'Created keputusanbpd must have id specified');
        $this->assertNotNull(keputusanbpd::find($createdkeputusanbpd['id']), 'keputusanbpd with given id must be in DB');
        $this->assertModelData($keputusanbpd, $createdkeputusanbpd);
    }

    /**
     * @test read
     */
    public function testReadkeputusanbpd()
    {
        $keputusanbpd = $this->makekeputusanbpd();
        $dbkeputusanbpd = $this->keputusanbpdRepo->find($keputusanbpd->id);
        $dbkeputusanbpd = $dbkeputusanbpd->toArray();
        $this->assertModelData($keputusanbpd->toArray(), $dbkeputusanbpd);
    }

    /**
     * @test update
     */
    public function testUpdatekeputusanbpd()
    {
        $keputusanbpd = $this->makekeputusanbpd();
        $fakekeputusanbpd = $this->fakekeputusanbpdData();
        $updatedkeputusanbpd = $this->keputusanbpdRepo->update($fakekeputusanbpd, $keputusanbpd->id);
        $this->assertModelData($fakekeputusanbpd, $updatedkeputusanbpd->toArray());
        $dbkeputusanbpd = $this->keputusanbpdRepo->find($keputusanbpd->id);
        $this->assertModelData($fakekeputusanbpd, $dbkeputusanbpd->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletekeputusanbpd()
    {
        $keputusanbpd = $this->makekeputusanbpd();
        $resp = $this->keputusanbpdRepo->delete($keputusanbpd->id);
        $this->assertTrue($resp);
        $this->assertNull(keputusanbpd::find($keputusanbpd->id), 'keputusanbpd should not exist in DB');
    }
}
